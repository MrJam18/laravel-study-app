<div class="admin-setter__main">
    <div class="admin-setter__content">
        <h3 class="header">{{$vars->header}}</h3>
        <form method="post" action='{{$vars->actionRoute}}' class="form-group admin-setter__form">
            <div>
                @csrf
                <label for="createNews__category" class="admin-setter__label">Категория</label>
                <x-select :value="$vars->model->category_id" required id="createNews__category" name="category_id" class="form-control admin-setter__input" :list="$vars->data['categories']" ></x-select>
                <label for="createNews__category" class="admin-setter__label">Источник</label>
                <x-select :value="$vars->model->news_source_id" required id="createNews__category" name="news_source_id" class="form-control admin-setter__input" :list="$vars->data['newsSources']"></x-select>
                <label class="admin-setter__label" for="createNews__header">Заголовок</label>
                <input required type="text" value="{{$vars->model->title}}" class="form-control admin-setter__input" name="title" id="createNews__header">
                <label class="admin-setter__label" for="createNews__description">Краткое описание</label>
                <textarea class="form-control admin-setter__input" id="createNews__description" required rows="4" name="description">{{$vars->model->description}}</textarea>
                <label class="admin-setter__label" for="createNews__text">Текст статьи</label>
                <textarea class="form-control admin-setter__input" id="createNews__text" required rows="10" name="text">{{$vars->model->text}}</textarea>
                <button class="btn btn-primary mb-2 admin-setter__button" >Сохранить</button>
            </div>
        </form>
    </div>
</div>
