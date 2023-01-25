<div class="container">
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach ($categories as $engName => $category)
            <a class="p-2 text-muted" href='{{\url('/categories/' . $engName)}}'>
                {{$category}}</a>
            @endforeach
        </nav>
    </div>
</div>
