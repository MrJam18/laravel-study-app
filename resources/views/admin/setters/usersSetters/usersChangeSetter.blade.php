<div class="admin-setter__main admin-setter__main_small">
    <div class="admin-setter__content">
        <h3 class="header admin-setter__header">{{$vars->header}}</h3>
        <form method="post" action='{{$vars->actionRoute}}' class="form-group admin-setter__form">
            <div>
                @csrf
                <label for="name" class="admin-setter__label">Имя пользователя</label>
                <input required type="text" value="{{$vars->model->name}}" class="form-control admin-setter__input {{\errClass($errors->has('name'))}}" name="name" id="name">
                <label class="admin-setter__label" for="email">Электронная почта</label>
                <input required type="email" value="{{$vars->model->email}}" class="form-control admin-setter__input {{\errClass($errors->has('email'))}}" name="email" id="email">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <label class="admin-setter__label" for="reset-password">Сбросить пароль</label>
                        <input class="admin-setter__checkbox" id="reset-password" name="reset-password" type="checkbox">
                    </div>
                    <div class="d-flex">
                        <label class="admin-setter__label" for="is-admin">Сделать администратором</label>
                        <input class="admin-setter__checkbox" id="is-admin" name="is_admin" checked="{{$vars->model->is_admin}}" type="checkbox">
                    </div>
                </div>
                    <button class="btn btn-primary mb-2 admin-setter__button admin-setter__button_small" >Сохранить</button>

            </div>
            <x-form-error/>
        </form>
    </div>
</div>
