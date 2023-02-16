
@php
if(\getIfSet($errorHas)) {
    if(isset($class)) $class = $class . ' is-invalid';
    else $class = 'is-invalid';
}
else $class = \getIfSet($class);
@endphp
<select {{\ifSet($required, 'required')}} {{\ifSet($id, "id=$id")}}  {{\ifSet($name, "name=$name")}} class="{!!$class!!}">
    {{$valueSetted = isset($value)}}
    <option value="" {{!$valueSetted ? 'selected' : null}} disabled>--Выбрать--</option>
    @foreach($list as $item)
        <option {{($valueSetted && $value == $item->id) ? 'selected' : null}} {{\ifSet($value, $item->id === $value)}} value="{{$item->id}}">{{$item->title ?? $item->name}}</option>
    @endforeach
</select>
