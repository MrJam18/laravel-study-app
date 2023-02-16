@push('css')
    <link rel="stylesheet" href="{{\asset('css/admin/list.css')}}">
@endpush
<div class="admin-container">
    <div class="btn-toolbar admin-list__toolbar admin-list__header">
        <h4 class="header">{{$vars->header}}</h4>
        <button type="button" class="btn btn-outline-primary admin-list__create-button"><a class="antilink admin-list__create-link" href="{{\route( $vars->routes . 'create')}}">Создать</a></button>
    </div>
</div>
<table class="table table-striped">
    <thead class="table-dark">
    <tr>
        @foreach($vars->tableHeaders as $header)
        <th scope="col">{{$header}}</th>
        @endforeach
        <th scope="col">Опции</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vars->list as $item)
        <tr>
            @foreach($vars->properties as $globalProperty)
                @php
                    if(is_array($globalProperty)) $value = array_reduce($globalProperty, fn($value, $property) => $value->$property, $item);
                    else $value = $item->$globalProperty;
                @endphp
                <td>{{$value}}</td>
            @endforeach
            <td><button data-id="{{$item->id}}" type="button" id="confirming-button" class="admin-list__delete-button antibutton" data-bs-toggle="modal" data-bs-target="#exampleModal">Удалить</button>/<a href="{{\route( $vars->routes . 'change', [$item->id])}}">Изменить</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="admin-container">
    {{$vars->list->links()}}
</div>
<div class="invisible" id="delete-route">{{\url($vars->routes . 'actions/delete')}}</div>
<x-confirm />
