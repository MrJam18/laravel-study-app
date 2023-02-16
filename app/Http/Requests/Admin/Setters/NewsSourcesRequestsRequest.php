<?php
declare(strict_types=1);

namespace App\Http\Requests\Admin\Setters;

use App\Http\Requests\Common\GeneralRequest;

class NewsSourcesRequestsRequest extends GeneralRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'between:2,255'],
            'phone' => ['required', 'regex:/^8[\d]{9}|\+[\d]{10}$/'],
            'email' => ['email', 'between:3,255'],
            'description' => ['string', 'between:5,1000', 'nullable'],
            'text' => ['required', 'string', 'min:10']
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'имя заказчика',
            'description' => 'краткое описание запроса',
            'text' => 'текст запроса',
            'phone' => 'номер телефона'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Нужно заполнить поле :attribute',
            'phone.regex' => 'поле :attribute должно начинаться с +7 или 8 и иметь после этого не более 9 цифр.',
        ];
    }
}
