<?php
declare(strict_types=1);

namespace App\Models\Casts;

use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RusDateTimeCast implements CastsAttributes
{
    private string $isoFormat = 'Y-m-d';
    private string $rusFormat = 'd.m.Y H:i:s';

    public function get($model, string $key, $value, array $attributes)
    {
       return (new Carbon($value))->format($this->rusFormat);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if($value instanceof DateTime) return $value->format($this->isoFormat);
        if(is_string($value) && str_contains($value, '.')) {
            $dateTime = Carbon::createFromFormat($this->rusFormat, $value);
            return $dateTime->format($this->isoFormat);
        }
        return $value;
    }
}
