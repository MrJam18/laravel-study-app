<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>О нас</h1>
            <p>{{\fake()->text(500)}}</p>
        </div>
    </div>
    <div class="container">
        <h3>Формы обратной связи</h3>
        <ul>
            <li><a href="{{\route('about/review')}}">Отзыв о нас</a></li>
            <li><a href="{{\route('about/dataExport')}}">Запрос на выгрузку данных</a></li>
        </ul>
    </div>
</main>
