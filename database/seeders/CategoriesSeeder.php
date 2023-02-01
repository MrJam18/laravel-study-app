<?php

declare(strict_types = 1);

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }
    private function getData(): array
    {
        return [
            $this->buildCategory('О Компаниях', 'companies', \fake()->text()),
            $this->buildCategory('Трудовые новости', 'job', \fake()->text()),
            $this->buildCategory('Российские новости', 'russian', \fake('ru_RU')->realText()),
            $this->buildCategory('Американские новости', 'american', \fake()->realText()),
            $this->buildCategory('Французские новости', 'french', \fake('fr_FR')->realText())
        ];
    }

    private function buildCategory(string $title, string $name, string $description): array
    {
        return [
            'title' => $title,
            'name' => $name,
            'description' => $description,
            'created_at' => \date("Y-m-d H:i:s"),
            'updated_at' => \date("Y-m-d H:i:s")
        ];
    }
}
