<?php
declare(strict_types=1);

namespace App\Models\Mutators\Interfaces;

use Illuminate\Database\Eloquent\Casts\Attribute;

interface Mutator
{
    static function get(): Attribute;
}
