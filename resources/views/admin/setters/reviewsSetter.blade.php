@push('css')
    <link rel="stylesheet" href="{{\asset('css/about/feedback.css')}}">
@endpush
<div class="feedback-container">
    <h3>{{$vars->header}}</h3>
    <form method="post" action="{{$vars->actionRoute}}" class="form-group feedback__form">
        @csrf
        <label class="feedback__label" for="review__name">Ваше имя/ник</label>
        <input required type="text" value="{{$vars->model->username}}" class="form-control feedback__input" name="username" id="review__name">
        <label class="feedback__label" for="review__description">Краткое описание</label>
        <textarea class="form-control feedback__input" id="review__description" required rows="2" name="description">{{$vars->model->description}}</textarea>
        <label class="feedback__label" for="review__text">Ваш отзыв</label>
        <textarea class="form-control feedback__input" id="review__text" required rows="8" name="text">{{$vars->model->text}}</textarea>
        <button class="btn btn-primary mb-2 feedback__button" >Отправить</button>
    </form>
</div>
