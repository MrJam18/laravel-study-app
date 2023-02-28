<?php

namespace App\Jobs;

use App\Models\News\Category;
use App\Models\News\News;
use App\QueryBuilders\NewsQueryBuilder;
use App\Services\XmlParserNewsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    CONST NEWSMAX = 50;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private Category $category)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(XmlParserNewsService $service, NewsQueryBuilder $builder)
    {
        $newsByCategory = $builder->getListByCategory($this->category->id);
        $newsFromParser = $service->getNews($this->category);
        $newsForInsert = [];
        foreach ($newsFromParser as $parserNews) {
            $foundNews = $newsByCategory->first(fn(News $categoryNews) =>  $categoryNews->guid === (int)$parserNews->guid);
            if(!$foundNews) {
                $newsForInsert[] = $parserNews->toArray();
                $newsByCategory->prepend($parserNews);
            }
        }
        News::query()->insert($newsForInsert);
        if($newsByCategory->count() > self::NEWSMAX) {
            for($i = self::NEWSMAX; $i < $newsByCategory->count(); $i++) {
                $newsByCategory[$i]->delete();
            }
        }
    }


}
