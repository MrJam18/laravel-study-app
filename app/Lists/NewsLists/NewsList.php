<?php
declare(strict_types=1);

namespace App\Lists\NewsLists;

use App\Models\News\News;

class NewsList
{
    private array $list = [];
    public function __construct(private string $name,
                                private string $engName)
    {

    }

    function get(): array
    {
        return $this->list;
    }
    function deleteNews(int $id): ?News
    {
        $news = null;
        foreach ($this->list as $item)
        {
            if($item->getId() === $id) {
                $news = $item;
                break;
            }
        }
        return $news;
    }
    function getName(): string
    {
        return $this->name;
    }
    function getEngName(): string
    {
        return $this->engName;
    }
    function findById(int $id): ?News
    {
        foreach ($this->list as $news)
        {
            if($news->getId() === $id) {
                return $news;
            }
        }
        return null;
    }
    function addNews(News $news): void
    {
        $this->list[] = $news;
    }
    function getLastId(): int
    {
        $count = count($this->list);
        return $this->list[$count - 1]->getId();
    }
}
