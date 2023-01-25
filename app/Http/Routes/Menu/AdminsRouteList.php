<?php
declare(strict_types=1);

namespace App\Http\Routes\Menu;

use JetBrains\PhpStorm\Pure;

class AdminsRouteList extends RouteList
{
    private string $title;
    #[Pure] public function __construct(string $title)
    {
        $this->title = $title;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
