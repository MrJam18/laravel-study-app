<?php

declare(strict_types = 1);

namespace Database\Seeders;


use App\Models\News\Category;
use App\Models\News\NewsSource;
use App\Services\XmlParserNewsService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(XmlParserNewsService $service): void
    {
        $newsSources = NewsSource::all();
        $categories = new Collection();
        $newsSources->each(function ($newsSource) use ($service, &$categories) {
            $categories[] = $service->getCategory($newsSource);
        });
        $categories->each(fn(Category $category)=> $category->save());
    }

}
