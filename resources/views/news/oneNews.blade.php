<div class="one-news__main container">
    <x-news.news-header :title="$news->title" :description="$news->description"></x-news.news-header>
    <div class="one-news__text">{!!$news->text!!}</div>
    <div style="display: flex; justify-content: flex-end">{{$news->created_at}} г.</div>
</div>
