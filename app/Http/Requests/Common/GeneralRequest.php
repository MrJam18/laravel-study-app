<?php
declare(strict_types=1);

namespace App\Http\Requests\Common;

use Illuminate\Foundation\Http\FormRequest;

abstract class GeneralRequest extends FormRequest
{
    protected function getEngValidate(): string
    {
        return "regex:/^[a-zA-Z0-9[:punct:] ]*$/";
    }
    protected function getRusValidate(): string
    {
        return "regex:/^[\x{0400}-\x{04FF}0-9[:punct:] ]*$/u";
    }
    function getExists(string $table, string $column = 'id'): array
    {
        return ["exists:$table,$column", 'integer'];
    }
}
