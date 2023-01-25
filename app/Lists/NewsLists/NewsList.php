<?php
declare(strict_types=1);

namespace App\Lists\NewsLists;

use App\Models\News\News;


class NewsList
{
    /**
     * @var News[]
     */
    private array $list = [];
    public function __construct(private string $category,
                                private string $name,
                                private string $description)
    {

    }

    function get(): array
    {
        return $this->list;
    }

    /**
     * @param News[] $list
     * @return void
     */
    function set(array &$list):void
    {
        $this->list = &$list;
        $this->sortListByDate();
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
    function getCategoryName(): string
    {
        return $this->category;
    }
    function getName(): string
    {
        return $this->name;
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
        $this->sortListByDate();
    }
    function getLastId(): int
    {
        $count = count($this->list);
        return $this->list[$count - 1]->getId();
    }
    function getOneFreshestNews(): ?News
    {
        $news = null;
        if(isset($this->list[0])) $news = $this->list[0];
        return $news;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    private function sortListByDate(): void
    {
        usort($this->list, function (News $a, News $b) {
            if ($a->getCreationDateUnformatted() > $b->getCreationDateUnformatted()) return -1;
            else return 1;
        });
    }
}
