<?php
declare(strict_types=1);

namespace App\Lists\NewsLists;

use App\Exceptions\NotFoundListException;
use App\Models\News\News;
use JetBrains\PhpStorm\Pure;

class AllNewsList
{
    /**
     * @var NewsList[]
     */
    private array $list;
    #[Pure] public function __construct()
    {
        $companiesList = new NewsList('О компаниях', 'companies', \fake()->text());
        $jobNewsList = new NewsList('Трудовые новости', 'job', \fake()->text());
        $russianNewsList = new NewsList('Российские новости', 'russian', \fake('ru_RU')->realText());
        $americansList = new NewsList('Американские новости', 'americanNews', \fake()->realText());
        $frenchList = new NewsList('Французские новости', 'frenchNews', \fake('fr_FR')->realText());
        $this->list = [
            $companiesList,
            $jobNewsList,
            $russianNewsList,
            $americansList,
            $frenchList
        ];
    }

    /**
     * @return NewsList[]
     */
    public function get(): array
    {
        return $this->list;
    }

    /**
     * @throws NotFoundListException
     */
    function getCategoryList(string $category): NewsList
    {
        $list = null;
        foreach ($this->list as $item)
        {
            if($item->getName() === $category) {
                $list = $item;
                break;
            }
        }
        if(!$list) throw new NotFoundListException('cant find list by category ' . $category);
        return $list;
    }
    function getAllSortedNews(): array
    {
        $list = $this->getAllNews();
        usort($list, fn($a, $b)=> $a->getCreationDateUnformatted() < $b->getCreationDateUnformatted());
        return $list;
    }
    function getCategoriesNames(): array
    {
        $categories = [];
        foreach ($this->list as $item)
        {
            $categories[$item->getName()] = $item->getCategoryName();
        }
        return $categories;
    }

    /**
     * @throws NotFoundListException
     */
    function addNews(string $category, News $news): void
    {
        $list = $this->getCategoryList($category);
        $categoryName = $this->getCategoriesNames()[$category];
        $news->setCategory($categoryName);
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

    function getLastId(): int
    {
        $list = $this->getAllNews();
        usort($list, function(News $a, News $b)
        {
           if($a->getId() > $b->getId()) return 1;
           else return -1;
        });
        $last = count($list) - 1;
        return $list[$last]->getId();
    }

    function getOneFreshNewsInAllCategories()
    {
        foreach ($this->list as $listItem)
        {
            $listItem->getOneFreshestNews();
        }
    }

    /**
     * @return News[]
     */
    private function getAllNews(): array
    {
        $list = [];
        foreach ($this->list as $listItem)
        {
            $list = array_merge($list, $listItem->get());
        }
        return $list;
    }

}
