<section class="py-5 text-center container categories__header">
    @push('css')
        <link rel='stylesheet' href='{{\asset('css/components/news/newsHeader.css')}}'>
    @endpush
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{$title}}</h1>
            <p class="lead text-muted">{{$description}}</p>
        </div>
    </div>
</section>
