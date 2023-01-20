<?php
declare(strict_types=1);

namespace App\Models\News;

use App\Models\Interfaces\FakeNewsInterface;

class NewsForComputers extends News implements FakeNewsInterface
{

    /**
     * @throws \Exception
     */
    static function getFakeNews(int $id): News
    {
        $news = new static($id);
        $news->setHeader($news->getBits(50));
        $news->setDescription($news->getBits(300));
        $news->setCreationDate(\fake()->date());
        $news->setText($news->getBits(1200));
        return $news;
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
}
