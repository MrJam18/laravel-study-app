<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\News\Category;
use App\Models\News\News;
use App\Models\News\NewsSource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParserNewsService
{
    function getNews(Category $category): Collection
    {
        $data = XmlParser::load($category->newsSource->url)->parse([
            'news' => [
                'uses' => 'channel.item[title,link,description,pubDate,guid]'
            ]
        ]);

        return new Collection(array_map(function ($item) use ($category) {
            $news = new News();
            $news->created_at = new Carbon($news['pubDate']);
            $news->text = \fake()->text(1000);
            $news->category_id = $category->id;
            $news->link = $item['link'];
            $news->title = $item['title'];
            $news->description = $item['description'];
            $news->guid = $item['guid'];
            return $news;
        }, $data['news']));
    }
    function getCategory(NewsSource $newsSource): Category
    {
        $data = XmlParser::load($newsSource->url)->parse([
            'description' => [
                'uses' => 'channel.description'
            ],
            'title' => [
                'uses' => 'channel.title'
            ]
        ]);
        $name = Str::afterLast(rtrim($newsSource->url,'/'), '/');
        $category = new Category();
        $category->name = $name;
        $category->title = $data['title'];
        $category->description = $data['description'];
        $newsSource->category()->save($category);
        return $category;
    }
}
