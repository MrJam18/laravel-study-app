<?php
declare(strict_types=1);

namespace App\Http\Requests\Admin\Setters;

use App\Http\Requests\Common\GeneralRequest;

class UsersChangeSetterRequest extends GeneralRequest
{
    protected function prepareForValidation(): void
    {
        if(!$this->input('is_admin')) {
            $this->merge(['is_admin' => false]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [$this->getRusValidate(), 'required', 'between:2,255'],
            'email' => ['required', 'email', 'between:2,255'],
            'is_admin' => ['boolean'],
            'reset_password' => ['boolean']
        ];
    }
}
