<div class="admin-setter__main admin-setter__main_small">
    <div class="admin-setter__content">
        <h3 class="header admin-setter__header">{{$vars->header}}</h3>
        <form method="post" action='{{$vars->actionRoute}}' class="form-group admin-setter__form">
            <div>
                @csrf
                <label for="name" class="admin-setter__label">Имя заказчика</label>
                <input required type="text" value="{{$vars->model->name}}" class="form-control admin-setter__input {{\errClass($errors->has('name'))}}" name="name" id="name">
                <label for="phone" class="admin-setter__label">Номер Телефона</label>
                <input required type="tel" value="{{$vars->model->phone}}" class="form-control admin-setter__input {{\errClass($errors->has('phone'))}}" name="phone" id="phone">
                <label class="admin-setter__label" for="email">Электронная почта</label>
                <input required type="email" value="{{$vars->model->email}}" class="form-control admin-setter__input {{\errClass($errors->has('email'))}}" name="email" id="email">
                <label class="admin-setter__label" for="description">Краткое описание запроса</label>
                <textarea class="form-control admin-setter__input {{errClass($errors->has('description'))}}" id="description" rows="2" name="description">{{$vars->model->description}}</textarea>
                <label class="admin-setter__label" for="text">Текст запроса</label>
                <textarea class="form-control admin-setter__input {{errClass($errors->has('text'))}}" id="text" required rows="8" name="text">{{$vars->model->text}}</textarea>
                <button class="btn btn-primary mb-2 admin-setter__button admin-setter__button_small" >Сохранить</button>
            </div>
            <x-formerror/>
        </form>
    </div>
    @if(\session('error'))
        <div class="error admin-setter__error">{{\session('error')}}</div>
    @endif
</div>
