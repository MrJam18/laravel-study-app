<?php

declare(strict_types=1);
namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormError extends Component
{
    private array|null $errors;

    public function __construct()
    {
        $validatedErrors = \session('errors');
        $customError = \session('error');
        if($validatedErrors) {
            if($customError) $validatedErrors[] = $customError;
            $this->errors = $validatedErrors->all();
        }
        else $this->errors = $customError ? [$customError] : null;
    }


    public function render(): View
    {
        return view('components.form-error', ['errors' => $this->errors]);
    }
}
