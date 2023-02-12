<?php
declare(strict_types=1);

namespace App\View\Interfaces;

use Illuminate\View\View;

interface LayoutsInterface
{
    public function render(string $viewPath, string $title, ?array $data = []): View;
    public function addCss(string $cssPath): void;
}
