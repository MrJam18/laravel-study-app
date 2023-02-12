@pushOnce('css')
    <link rel="stylesheet" href="{{\asset('css/components/alert.css')}}">
@endPushOnce
@pushOnce('js')
    <script src="{{\asset('js/components/alert.js')}}"></script>
@endPushOnce
<div class="alert alert-{{$type}} alert-dismissible fade show" role="alert">
    <div class="alert__inner-container">
        <div class="alert__content">
            <strong>{{$message}}</strong>
    </div>
        <button class="alert__close-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M6.4 18.65 5.35 17.6l5.6-5.6-5.6-5.6L6.4 5.35l5.6 5.6 5.6-5.6 1.05 1.05-5.6 5.6 5.6 5.6-1.05 1.05-5.6-5.6Z"/></svg>
        </button>
    </div>
</div>
