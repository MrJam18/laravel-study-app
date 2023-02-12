<?php
declare(strict_types=1);

namespace App\View\Layouts;

use Illuminate\View\View;

abstract class LayoutView
{
    protected array $cssLinks = [];

    public function addCss(string $cssPath): void
    {
        $this->cssLinks[] = \asset('css' . DIRECTORY_SEPARATOR . $cssPath . '.css');
    }
    abstract function render(string $viewPath, string $title, ?array $data = []): View;

    public function __invoke(string $viewPath, string $title, ?array $data = []): View
    {
       return $this->render($viewPath, $title, $data);
    }
}
