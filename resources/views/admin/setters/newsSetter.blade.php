@push('js')
    <script src="{{\asset('js/ckeditor/ckeditor.js')}}"></script>
    <script defer>
        const options = {
            filebrowserUploadUrl: "{{route('admin/ckeditorUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        }
        window.onload = function () {
            CKEDITOR.replace( 'createNews__text', options);
        }
    </script>
@endpush

<div class="admin-setter__main">
    <div class="admin-setter__content">
        <h3 class="header">{{$vars->header}}</h3>
        <form method="post" action='{{$vars->actionRoute}}' class="form-group admin-setter__form">
            <div>
                @csrf
                <label for="createNews__category" class="admin-setter__label">Категория</label>
                <x-select :value="$vars->model->category_id" :errorHas="$errors->has('category_id')" required id="createNews__category" name="category_id" class="form-control admin-setter__input" :list="$vars->data['categories']" ></x-select>
                <label class="admin-setter__label" for="createNews__header">Заголовок</label>
                <input required type="text" value="{{$vars->model->title}}" class="form-control admin-setter__input {{\errClass($errors->has('title'))}}" name="title" id="createNews__header">
                <label class="admin-setter__label" for="createNews__link">Ссылка</label>
                <input required type="url" value="{{$vars->model->link}}" class="form-control admin-setter__input {{\errClass($errors->has('link'))}}" name="link" id="createNews__link">
                <label class="admin-setter__label" for="createNews__description">Краткое описание</label>
                <textarea class="form-control admin-setter__input {{\errClass($errors->has('description'))}}" id="createNews__description" required rows="3" name="description">{{$vars->model->description}}</textarea>
                <label class="admin-setter__label" for="createNews__text">Текст статьи</label>
                <textarea class="form-control admin-setter__input {{\errClass($errors->has('text'))}}" id="createNews__text" required rows="10" name="text">{{$vars->model->text}}
                </textarea>
                <button class="btn btn-primary mb-2 admin-setter__button" >Сохранить</button>
            </div>
        </form>
    </div>
    <x-formError />
</div>
