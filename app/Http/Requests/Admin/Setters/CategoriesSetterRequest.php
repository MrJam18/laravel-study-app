<?php
declare(strict_types=1);

namespace App\Http\Requests\Admin\Setters;

use App\Http\Requests\Common\GeneralRequest;

class CategoriesSetterRequest extends GeneralRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'between:5,255', $this->getEngValidate(), 'string'],
            'title' => ['required', 'between:5,255', $this->getRusValidate(), 'string'],
            'description' => ['required', 'between:20,1000', 'string']
        ];
    }
}
