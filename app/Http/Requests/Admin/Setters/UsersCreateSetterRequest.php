<?php
declare(strict_types=1);

namespace App\Http\Requests\Admin\Setters;

use App\Http\Requests\Common\GeneralRequest;
use Illuminate\Validation\Rules\Password;

class UsersCreateSetterRequest extends GeneralRequest
{

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if(!$this->input('is_admin')) {
            $this->replace(['is_admin' => false]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => [$this->getRusValidate(), 'required', 'between:2,255'],
            'email' => ['required', 'email', 'between:2,255'],
            'is_admin' => ['boolean'],
            'password' => ['required', Password::min(7)->mixedCase()->numbers()]
        ];
    }
}
