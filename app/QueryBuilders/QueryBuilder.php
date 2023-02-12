<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\QueryBuilders\Components\OrderBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

abstract class QueryBuilder
{
    protected string $model;
    protected OrderBy $defaultOrderBy;


    function getAll(): Collection
    {
        return $this->query()->get();
    }

    protected function getRusDate(string $field): Expression
    {
        if(preg_match('/./', $field)) {
            $as = explode('.', $field);
            $as = $as[count($as) - 1];
        }
        else $as = $field;
        return DB::raw("date_format($field, '%d.%m.%Y') as $as");
    }
    protected function rusDateTime(string $field): Expression
    {
        if(preg_match('/./', $field)) {
            $as = explode('.', $field);
            $as = $as[count($as) - 1];
        }
        else $as = $field;
        return DB::raw("date_format($field, '%d.%m.%Y %H:%i:%s') as $as");
    }


    protected function getOrdered(?OrderBy $orderBy = null): Builder
    {
        if(!$orderBy) $orderBy = $this->defaultOrderBy;
        return $this->query()->orderBy($orderBy->column, $orderBy->direction->name);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    protected function query(): Builder
    {
        return $this->model::query();
    }

}
