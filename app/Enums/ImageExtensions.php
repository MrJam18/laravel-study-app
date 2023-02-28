<?php
declare(strict_types=1);

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

Enum ImageExtensions
{
 case pdf;
 case jpg;
 case png;

 static function exists(string $value): bool
 {
     $cases = self::cases();
     foreach ($cases as $extension) {
        if($extension->name === $value) return true;
     }
     return false;
 }
}
