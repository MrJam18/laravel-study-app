<div class="create-news__main">
    <div class="create-news__content">
        <h3 class="header">Создание новости</h3>
        <form action='{{\route('admin/createNewsAction')}}' class="form-group create-news__form">
            <div >
                <label for="createNews__category" class="create-news__label">Категория</label>
                <select id="createNews__category" name="category" class="form-control create-news__input" >
                    @foreach ($categoriesNames as $engName => $name)
                        <option name="category" value="{{$engName}}">{{$name}}</option>
                    @endforeach
                </select>
                <label class="create-news__label" for="createNews__header">Заголовок</label>
                <input type="text" class="form-control create-news__input" name="header" id="createNews__header">
                <label class="create-news__label" for="createNews__description">Краткое описание</label>
                <textarea class="form-control create-news__input" id="createNews__description" required rows="4" name="description"></textarea>
                <label class="create-news__label" for="createNews__text">Текст статьи</label>
                <textarea class="form-control create-news__input" id="createNews__text" required rows="10" name="text"></textarea>
                <button class="btn btn-primary mb-2 create-news__button" >Добавить</button>
            </div>
        </form>
    </div>
</div>
