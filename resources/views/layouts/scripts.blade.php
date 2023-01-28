{{--<script src={{\asset('js/bootstrap/bootstrap5.3.bundle.min.js')}}></script>--}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
<script src="{{\asset('js/bootstrap/popper.min.js')}}"></script>
<script src="{{\asset('js/bootstrap/bootstrap5.3.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap/holder.js')}}"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
@stack('js')
