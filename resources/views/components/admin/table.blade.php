@push('css')
    <link rel="stylesheet" href="{{\asset('css/components/admin/table.css')}}" >
@endpush
<div>
    <div class="admin-table__container">
        <div class="btn-toolbar admin-table__toolbar admin-table__header">
            <h4 class="header">{{$header}}</h4>
            <button type="button" class="btn btn-outline-primary"><a class="antilink" href="{{$links['create']}}">Создать новость</a></button>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            @foreach($tableHeaders as $header)
                <th scope="col">{{$header}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($list as $item)
            <tr>
                @foreach($properties as $property)
                    <td>{{$item->$property}}</td>
                @endforeach
                <td><a class="admin-table__delete-button" href="{{$links['delete']}}">Удалить</a>/<a href="{{$links['change']}}">Изменить</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="admin-table__container">
        {{$list->links()}}
    </div>
</div>
