<?php
declare(strict_types=1);

namespace App\Http\Routes\Menu;

class MenuRoute
{
    private string $name;
    private string $href;
    private string $title;
    public bool $isCurrentRoute = false;

    public function __construct(string $name, string $title)
    {
        $this->name = $name;
        $this->href = \route($name);
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

}
