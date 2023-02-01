<main class="container">
    @if($alert)
        <x-alert type="success" :text="$alert"></x-alert>
    @endif
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0 first-news">
            <h1 class="display-4 fst-italic">{{$first->title}}</h1>
            <p class="lead my-3">{{$first->description}}</p>
            <p class="lead mb-0"><a href="{{\route('news') . '/' . $first->id}}" class="text-white fw-bold">Читать</a></p>
        </div>
    </div>
    <x-news.news-list :list="$list"></x-news.news-list>
</main>
