<div class="category-list__main">
    <x-news.news-header :title="$list->getCategoryName()" :description="$list->getDescription()"></x-news.news-header>
    <x-news.news-category-list :hideCategory="true" :list="$list->get()"></x-news.news-category-list>
</div>
