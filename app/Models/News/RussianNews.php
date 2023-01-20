<?php
declare(strict_types=1);

namespace App\Models\News;


use App\Models\Interfaces\FakeNewsInterface;

class RussianNews extends News implements FakeNewsInterface
{
    static function getFakeNews(int $id): News
    {
        $faker = \fake('ru_RU');
        return new static($id, $faker->realText(50), $faker->realText(300), $faker->date(), $faker->realText(1200));
    }
}
