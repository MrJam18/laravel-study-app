<div class="container">
    <h4 class="header">Курс валют</h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Курс</th>
            <th scope="col">Номинал(руб.)</th>
            <th scope="col">Код</th>
        </tr>
        </thead>
        <tbody>

        @foreach($currencies as $currency)
        <tr>
            <td>{{$currency->name}}</td>
            <td>{{$currency->rate}}</td>
            <td>{{$currency->nominal}}</td>
            <td>{{$currency->char_code}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between mb-5">
        <div>Источник: {{$credential->source}}</div>
        <div>Дата обновления: {{$credential->updated_at}} г.</div>
    </div>
</div>
