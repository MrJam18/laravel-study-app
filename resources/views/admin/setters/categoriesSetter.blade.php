<div class="admin-setter__main admin-setter__main_small">
    <div class="admin-setter__content">
        <h3 class="header admin-setter__header">{{$vars->header}}</h3>
        <form method="post" action='{{$vars->actionRoute}}' class="form-group admin-setter__form">
            <div>
                @csrf
                <label for="name" class="admin-setter__label">Имя(англ.)</label>
                <input required type="text" value="{{$vars->model->name}}" class="form-control admin-setter__input @error('name') is-invalid @enderror" name="name" id="name">
                <label for="title" class="admin-setter__label">Заголовок(рус.)</label>
                <input required type="text" value="{{$vars->model->title}}" class="form-control admin-setter__input @error('title') is-invalid @enderror" name="title" id="title">
                <label class="admin-setter__label" for="description">Краткое описание</label>
                <textarea class="form-control admin-setter__input @error('description') is-invalid @enderror" id="description" required rows="4" name="description">{{$vars->model->description}}</textarea>
                <button class="btn btn-primary mb-2 admin-setter__button admin-setter__button_small" >Сохранить</button>
            </div>
        </form>
    </div>
    <x-formError />
</div>
