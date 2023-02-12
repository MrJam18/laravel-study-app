<?php
declare(strict_types=1);

namespace App\Http\Routes\Lists;

class AdminRouteLists
{
    /**
     * @var AdminRouteList[] $list
     */
    private array $lists = [];

    function addList(AdminRouteList $list):void
    {
        $this->lists[] = $list;
    }

    /**
     * @return AdminRouteList[]
     */
    function get(): array
    {
        return $this->lists;
    }

    function setCurrentRoute()
    {
        foreach ($this->lists as $list)
        {
            $list->setCurrentRoute();
        }
    }

}
