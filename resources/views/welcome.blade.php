<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0 first-news">
            <h1 class="display-4 fst-italic">{{$first->getHeader()}}</h1>
            <p class="lead my-3">{{$first->getDescription()}}</p>
            <p class="lead mb-0"><a href="{{$first->getPath()}}" class="text-white fw-bold">Читать</a></p>
        </div>
    </div>
    <x-news.news-list :list="$list"></x-news.news-list>
</main>
