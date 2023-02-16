<?php
declare(strict_types=1);

namespace App\Http\Requests\Admin\Setters;

use App\Http\Requests\Common\GeneralRequest;

class ReviewsSetterRequest extends GeneralRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['string', 'required', 'between:2,255'],
            'description' => ['between:10,500', 'string', 'nullable'],
            'text' => ['required', 'string', 'min:10']
        ];
    }
}
