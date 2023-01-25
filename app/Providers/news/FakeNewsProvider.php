<?php
declare(strict_types=1);

namespace App\Providers\news;

use App\Exceptions\NotFoundListException;
use App\Lists\NewsLists\AllNewsList;
use App\Models\News\News;

class FakeNewsProvider
{
    private AllNewsList $list;
    private int $id = 0;
    private array $arrayList;
    public function __construct()
    {
        if(!$this->checkSessionSet()) {
            $this->list = new AllNewsList();
            $categories = $this->list->getCategoriesNames();
            $categories = array_keys($categories);
            foreach ($categories as $category) {
                $this->arrayList[$category] = [];
            }
            $faker = \fake();
            $rusFaker = \fake('ru_RU');
            $frenchFaker = \fake('fr_FR');
            $descriptionMax = 400;
            $textMax = 4000;
            for($i = 0; $i < 10; $i++) {
                $companiesNews = new News($this->id, rtrim($faker->realText(30), '.') . ' in the ' . $faker->company(), $faker->realText($descriptionMax), $faker->date(), $faker->realText($textMax));
                $this->addNewsOnCreate('companies', $companiesNews);
                $jobNews = new News($this->id, $faker->jobTitle() . ' in the ' . $faker->company(), $faker->text($descriptionMax), $faker->date(), $faker->realText($textMax));
                $this->addNewsOnCreate('job', $jobNews);
                $rusNews = new News($this->id, $rusFaker->realText(50), $rusFaker->realText(300), $rusFaker->date(), $rusFaker->realText($textMax));
                $this->addNewsOnCreate('russian', $rusNews);
                $american = new News($this->id, $faker->realText(50), $faker->realText($descriptionMax), $faker->date(), $faker->realText($textMax));
                $this->addNewsOnCreate('americanNews', $american);
                $french = new News($this->id, $frenchFaker->realText(50), $frenchFaker->realText($descriptionMax), $frenchFaker->date(), $frenchFaker->realText($textMax));
                $this->addNewsOnCreate('frenchNews', $french);
            }
            foreach ($categories as $category)
            {
                $this->list->getCategoryList($category)->set($this->arrayList[$category]);
            }
            $_SESSION['fakeNews'] = $this->list;
        }
        else $this->list = $_SESSION['fakeNews'];
    }

    function getList(): AllNewsList
    {
        return $this->list;
    }
    private function checkSessionSet(): bool
    {
        return isset($_SESSION['fakeNews']);
    }
    private function addNewsOnCreate(string $category, News $news)
    {
        $categoryName = $this->list->getCategoriesNames()[$category];
        $news->setCategory($categoryName);
        $this->arrayList[$category][] = $news;
        $this->id++;
    }
}
