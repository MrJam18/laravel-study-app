<div class="one-news__main">
    <x-news.news-header :title="$news->getHeader()" :description="$news->getDescription()"></x-news.news-header>
    <div class="one-news__text">{{$news->getText()}}</div>
    <div style="display: flex; justify-content: flex-end">{{$news->getCreationDate()}} г.</div>
</div>
