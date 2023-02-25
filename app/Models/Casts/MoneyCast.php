<?php
declare(strict_types=1);

namespace App\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MoneyCast implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        return $value;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if(is_string($value) && str_contains($value, ',')) {
            return str_replace(',', '.', $value);
        }
        return $value;
    }
}
