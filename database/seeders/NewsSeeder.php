<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    private array $categoriesIds;
    private array $news = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $this->fillNews();
        DB::table('news')->insert($this->news);
    }

    private function fillNews(): void
    {
        $categories = DB::select('SELECT * FROM categories');
        foreach ($categories as $category) {
            $this->categoriesIds[$category->name] = $category->id;
        }
        $faker = \fake();
        $rusFaker = \fake('ru_RU');
        $frenchFaker = \fake('fr_FR');
        $descriptionMax = 400;
        $textMax = 4000;
        for($i = 0; $i < 20; $i++) {
            $this->addNews(rtrim($faker->realText(30), '.') . ' in the ' . $faker->company(), $faker->realText($descriptionMax), $faker->realText($textMax), 'companies');
            $this->addNews($faker->jobTitle() . ' in the ' . $faker->company(), $faker->text($descriptionMax), $faker->realText($textMax),
            'job');
            $this->addNews($rusFaker->realText(50), $rusFaker->realText($descriptionMax), $rusFaker->realText($textMax),'russian');
            $this->addNews($faker->realText(50), $faker->realText($descriptionMax), $faker->realText($textMax), 'american');
            $this->addNews($frenchFaker->realText(50), $frenchFaker->realText($descriptionMax), $frenchFaker->realText($textMax), 'french');
        }
    }
    private function addNews(string $title, string $description, string $text, string $categoryName): void
    {
        $this->news[] = [
            'title' => $title,
            'description' => $description,
            'text' => $text,
            'category_id'=> $this->categoriesIds[$categoryName],
            'created_at' => \fake()->date(),
            'news_source_id' => rand(1, 30)
        ];
    }
}
