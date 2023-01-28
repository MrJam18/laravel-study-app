<div class="feedback-container">
    <h3>Оставьте отзыв о нас</h3>
    <form method="post" action="{{\route('api/createReview')}}" class="form-group feedback__form">
        @csrf
        <label class="feedback__label" for="review__name">Ваше имя/ник</label>
        <input required type="text" class="form-control feedback__input" name="name" id="review__name">
        <label class="feedback__label" for="review__text">Ваш отзыв</label>
        <textarea class="form-control feedback__input" id="review__text" required rows="8" name="text"></textarea>
        <button class="btn btn-primary mb-2 feedback__button" >Отправить</button>
    </form>
</div>
