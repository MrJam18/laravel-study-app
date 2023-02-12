<?php
declare(strict_types=1);

namespace App\Http\Routes\Lists;

use JetBrains\PhpStorm\Pure;

class AdminRouteList extends RouteList
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
