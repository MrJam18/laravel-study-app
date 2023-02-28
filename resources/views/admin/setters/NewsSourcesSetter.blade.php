<div class="admin-setter__main admin-setter__main_small">
    <div class="admin-setter__content">
        <h3 class="header admin-setter__header">{{$vars->header}}</h3>
        <form method="post" action='{{$vars->actionRoute}}' class="form-group admin-setter__form">
            <div>
                @csrf
                <label for="url" class="admin-setter__label mt-3">URL Источника новостей</label>
                <input required type="url" value="{{$vars->model->url}}" class="form-control admin-setter__input @error('url') is-invalid @enderror" name="url" id="url">
                <button class="btn btn-primary mb-2 admin-setter__button admin-setter__button_small">Сохранить</button>
            </div>
        </form>
    </div>
    <x-formError />
</div>
