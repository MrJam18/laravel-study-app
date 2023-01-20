<?php
declare(strict_types=1);

namespace App\Models\News;

use App\Models\Interfaces\FakeNewsInterface;

class CompaniesNews extends News implements FakeNewsInterface
{

    static function getFakeNews(int $id): News
    {
        $faker = \fake();
        return new static($id, rtrim($faker->realText(30), '.') . ' in the ' . $faker->company(), $faker->realText(300), $faker->date(), $faker->realText(1200));
    }
}
