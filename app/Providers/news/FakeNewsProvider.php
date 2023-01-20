<?php
declare(strict_types=1);

namespace App\Providers\news;

use App\Lists\NewsLists\AllNewsList;
use App\Models\News\CompaniesNews;
use App\Models\News\JobNews;
use App\Models\News\News;
use App\Models\News\NewsForComputers;
use App\Models\News\RussianNews;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class FakeNewsProvider
{
    private AllNewsList $list;
    public function __construct()
    {
        if(!$this->checkSessionSet()) {
            $list = new AllNewsList();
            $id = 1;
            $faker = \fake();
            $rusFaker = \fake('ru_RU');
            for($i = 0; $i < 10; $i++) {
                $companiesNews = new News($id, rtrim($faker->realText(30), '.') . ' in the ' . $faker->company(), $faker->realText(300), $faker->date(), $faker->realText(1200));
                $id++;
                $list->addNewsInCategory('companies', $companiesNews);
                $jobNews = new News($id, $faker->jobTitle() . ' in the ' . $faker->company() . '. ' . $faker->realText(30), $faker->text(300), $faker->date(), $faker->realText(1200));
                $id++;
                $list->addNewsInCategory('job', $jobNews);
                $computers = new News($id);
                $computers->setHeader($this->getBits(50));
                $computers->setDescription($this->getBits(300));
                $computers->setCreationDate($faker->date());
                $computers->setText($this->getBits(1200));
                $id++;
                $list->addNewsInCategory('computers', $computers);
                $rusNews = new News($id, $rusFaker->realText(50), $rusFaker->realText(300), $rusFaker->date(), $rusFaker->realText(1200));
                $id++;
                $list->addNewsInCategory('russian', $rusNews);
            }
            $_SESSION['fakeNews'] = $list;
        }
        else $list = $_SESSION['fakeNews'];
        $this->list = $list;
    }

    function getList(): AllNewsList
    {
        return $this->list;
    }

    function addNews(News $news, string $category)
    {
        $this->list->addNewsInCategory($category, $news);
    }
    private function getBits(int $numberOfDigits): string
    {
        $digits = '';
        for($i = 0; $i < $numberOfDigits; $i++)
        {
            $digits .= rand(0, 1);
        }
        return $digits;
    }
    private function checkSessionSet(): bool
    {
        return isset($_SESSION['fakeNews']);
    }
}
