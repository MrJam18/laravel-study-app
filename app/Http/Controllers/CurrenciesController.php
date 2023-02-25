<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractControllers\UsersController;
use App\Models\CurrenciesCredential;
use App\Models\Currency;
use App\QueryBuilders\CurrenciesQueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Orchestra\Parser\Xml\Facade as XmlParser;

class CurrenciesController extends UsersController
{
    function __invoke(CurrenciesQueryBuilder $builder): View
    {
        /**
         * @var CurrenciesCredential $credential
         */
        $credential = CurrenciesCredential::query()->first();
        $now = new Carbon("midnight");
        if(!$now->eq($credential->updatedAt)) {
            $data = XmlParser::load('https://www.cbr-xml-daily.ru/daily.xml')->parse([
                'currencies' => [
                    'uses' => 'Valute[Name,Value,Nominal,CharCode,::ID]'
                ],
                'name' => [
                    'uses' => '::name'
                ]
            ]);
            $ids = [];
            $currencies = new Collection(array_map(function ($currencyData) use (&$ids) {
                $ids[] = $currencyData['::ID'];
                return [
                    'id' => $currencyData['::ID'],
                    'name' => $currencyData['Name'],
                    'rate' => \formatRusFloat($currencyData['Value']),
                    'nominal' => $currencyData['Nominal'],
                    'char_code' => $currencyData['CharCode']
                ];
            }, $data['currencies']));
            Currency::query()->upsert($currencies->toArray(), ['id']);
            $builder->deleteRowsWhereNotInIds($ids);
            $currencies = $currencies->map(fn ($currencyData) => new Currency($currencyData));
            $credential->updatedAt = $now;
            $credential->source = $data['name'];
            $credential->save();
        }
        else $currencies = Currency::all();
        return $this->view->render('currencies', 'Курс валют на сегодня', ['currencies' => $currencies,
            'credential' => $credential]);
    }

}
