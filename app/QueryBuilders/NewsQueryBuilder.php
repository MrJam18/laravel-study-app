<?php
/** @noinspection PhpIncompatibleReturnTypeInspection */
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News\News;
use App\QueryBuilders\Components\enums\OrderDirection;
use App\QueryBuilders\Components\OrderBy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\Pure;

class NewsQueryBuilder extends QueryBuilder
{

    #[Pure] public function __construct()
    {
        $this->model = News::class;
        $this->defaultOrderBy = new OrderBy('news.created_at', OrderDirection::DESC);
    }

    function getOne(int $id): ?News
    {
        return $this->query()->find($id, ['title', 'description', $this->getRusDate('created_at'), 'text']);
    }
    function getListByCategory(int $categoryId): Collection
    {
        return $this->getOrdered()->
            where('category_id', $categoryId)
            ->get(['id', $this->getRusDate('created_at') , 'title', 'text']);
    }

    function getList(?OrderBy $orderBy): Collection
    {
        if(!$orderBy) $orderBy = $this->defaultOrderBy;
        return $this->getOrdered($orderBy)
            ->with('category:id,title')
            ->get(['news.id', $this->getRusDate('news.created_at'), 'news.title', 'news.description', 'news.category_id']);
    }
    function getAdminList(): LengthAwarePaginator
    {
        return $this->getOrdered()
            ->with(['category:id,title', 'newsSource:id,name'])
            ->select(['news.id', $this->getRusDate('news.created_at'), 'news.title', 'news.news_source_id', 'news.category_id'])
            ->paginate(20);
    }

    function getFirstFreshestNewsInCategories(): Collection
    {
        $in = $this->query()->distinct()->get(DB::raw('FIRST_VALUE(id) OVER (PARTITION BY category_id ORDER BY news.created_at desc) as id'))->map(fn($news)=> $news->id);
        return $this->getOrdered()->whereIn('news.id', $in)
            ->with('category:id,title')
            ->get(['news.id', $this->getRusDate('news.created_at'), 'news.title', 'news.description', 'news.category_id']);
    }


}
