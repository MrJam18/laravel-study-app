<div class="feedback-container">
    <h3 class="feedback__header">Запрос на получение выгрузки данных</h3>
    <form method="post" action="{{\route('api/createDataExportRequest')}}" class="form-group feedback__form">
        @csrf
        <label class="feedback__label" for="dataExport__name">Ваше имя</label>
        <input value="{{\old('name')}}" required type="text" class="form-control feedback__input" name="name" id="dataExport__name">
        <label class="feedback__label" for="dataExport__phone">Номер телефона</label>
        <input value="{{\old('phone')}}" required type="tel" pattern="[0-9]{11}" class="form-control feedback__input" name="phone" id="dataExport__phone">
        <label class="feedback__label" for="dataExport__email">Ваш email</label>
        <input value="{{\old('email')}}" required type="email" class="form-control feedback__input" name="email" id="dataExport__email">
        <label class="feedback__label" for="dataExport__text">Ваш запрос</label>
        <textarea class="form-control feedback__input" id="dataExport__text" required rows="8" name="text">{{\old('text')}}</textarea>
        @if($errorMessage)
            <div class="error">{{$errorMessage}}</div>
        @endif
        <button class="btn btn-primary mb-2 feedback__button" >Отправить</button>
    </form>
</div>
