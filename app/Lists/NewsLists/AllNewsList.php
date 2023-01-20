<?php
declare(strict_types=1);

namespace App\Lists\NewsLists;

use App\Exceptions\NotFoundListException;
use App\Exceptions\PageNotFoundException;
use App\Models\News\News;
use Exception;
use JetBrains\PhpStorm\Pure;

class AllNewsList
{
    private array $list;
    #[Pure] public function __construct()
    {
        $companiesList = new NewsList('О компаниях', 'companies');
        $computersList = new NewsList("Компьютерные новости", 'computers');
        $jobNewsList = new NewsList('Трудовые новости', 'job');
        $russianNewsList = new NewsList('Российские новости', 'russian');
        $this->list = [
            $companiesList,
            $computersList,
            $jobNewsList,
            $russianNewsList
        ];
    }

    /**
     * @throws PageNotFoundException
     */
    function getCategoryList(string $category): NewsList
    {
        $list = $this->findCategoryByEngName($category);
        if(!$list) throw new PageNotFoundException();
        return $list;
    }
    function sortByDate(): array
    {
        $list = [];
        foreach ($this->list as $listItem)
        {
            $list = array_merge($list, $listItem->get());
        }
        usort($list, fn($a, $b)=> $a->getCreationDateUnformatted() < $b->getCreationDateUnformatted());
        return $list;
    }
    function getCategoriesNames(): array
    {
        $categories = [];
        foreach ($this->list as $item)
        {
            $categories[$item->getEngName()] = $item->getName();
        }
        return $categories;
    }

    /**
     * @throws Exception
     */
    function addNewsInCategory(string $categoryName, $news)
    {
        $list = $this->findCategoryByEngName($categoryName);
        if(!$list) throw new NotFoundListException('cant find list by name' . $categoryName);
        $list->addNews($news);
    }
    function findById(int $id): ?News
    {
        foreach ($this->list as $list)
        {
            $news = $list->findById($id);
            if($news) return $news;
        }
        return null;
    }

    private function findCategoryByEngName(string $engName): ?NewsList
    {
        $list = null;
        foreach ($this->list as $item)
        {
            if($item->getEngName() === $engName) {
                $list = $item;
                break;
            }
        }
        return $list;
    }
    function getLastId():int
    {
        $lastId = 0;
        foreach ($this->list as $list)
        {
            $lastDeepId = $list->getLastId();
            if($lastDeepId > $lastId) $lastId = $lastDeepId;
        }
        return $lastId;
    }

}
