<div class="row mb-2">
    @push('css')
        <link rel='stylesheet' href='{{\asset('css/components/news/newsList.css')}}'>
    @endpush
    @isset($list)
        @forelse($list as $item)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static news-list__news-container">
                        <strong class="d-inline-block mb-2 text-primary news-list__category-block">{{$item->category->title}}</strong>
                        <h3 class="mb-0 news-list__header">{{$item->title}}</h3>
                        <p class="card-text mb-auto">{{$item->description}}</p>
                        <div class="mb-1 text-muted">{{$item->created_at}} г.</div>
                        <a href="{{$item->link}}" class="stretched-link">Читать</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Новостей нет</p>
        @endforelse
    @endisset
</div>
