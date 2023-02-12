<select {{\ifSet($required, 'required')}} {{\ifSet($id, "id=$id")}}  {{\ifSet($name, "name=$name")}} {!!\ifSet($class, "class='$class'")!!}>
    {{$valueSetted = isset($value)}}
    <option value="" {{!$valueSetted ? 'selected' : null}} disabled>--Выбрать--</option>
    @foreach($list as $item)
        <option {{($valueSetted && $value == $item->id) ? 'selected' : null}} {{\ifSet($value, $item->id === $value)}} value="{{$item->id}}">{{$item->title ?? $item->name}}</option>
    @endforeach
</select>
