<?php
declare(strict_types=1);

namespace App\Http\Requests\Admin\Setters;

use App\Http\Requests\Common\GeneralRequest;

class NewsSetterRequest extends GeneralRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => [...$this->getExists('categories'), 'required'],
            'link' => ['required', 'url'],
            'title' => ['required', 'between:3,255'],
            'description' => ['required', 'between:10,1000'],
            'text' => ['required', 'min:50']
        ];
    }
}
