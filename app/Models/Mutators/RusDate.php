<?php
declare(strict_types=1);

namespace App\Models\Mutators;

use App\Models\Mutators\Interfaces\Mutator;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RusDate implements Mutator
{
    const ISOFORMAT = 'Y-m-d';
    const RUSFORMAT = 'd.m.Y';

    static function get(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (new Carbon($value))->format(self::RUSFORMAT),
            set: function ($value) {
                if($value instanceof DateTime) return $value->format(self::ISOFORMAT);
                if(is_string($value) && str_contains($value, '.')) {
                    try {
                        $dateTime = Carbon::createFromFormat(self::RUSFORMAT, $value);
                    }
                    catch (Exception $exception) {
                        return $value;
                    }
                    return $dateTime->format(self::ISOFORMAT);
                }
                return $value;
            }
        );

    }
}
