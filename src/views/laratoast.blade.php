<script>
    @foreach (session('laratoast', collect())->toArray() as $laratoast)
    $.toast({


    text: '{{ $laratoast['text'] }}', // Text that is to be shown in the toast
    heading: '{{ $laratoast['heading'] }}', // Optional heading to be shown on the toast
    icon: '{{ $laratoast['icon'] }}', // Type of toast icon
    showHideTransition: '{{ $laratoast['showHideTransition'] }}', // fade, slide or plain
    allowToastClose: {{ $laratoast['allowToastClose']  == 1 ? "true" : "false" }}, // Boolean value true or false
    hideAfter: {{ $laratoast['hideAfter'] }}, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    stack: {{ $laratoast['stack'] }}, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    position: '{{ $laratoast['position'] }}', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values

    textAlign: '{{ $laratoast['textAlign'] }}',  // Text alignment i.e. left, right or center
    loader: {{ $laratoast['loader'] == 1 ? "true" : "false" }},  // Whether to show loader or not. True by default
    loaderBg: '{{ $laratoast['loaderBg'] }}',  // Background color of the toast loader
    beforeShow: function () {
        {{ $laratoast['beforeShow'] }}
    }, // will be triggered before the toast is shown
    afterShown: function () {
        {{ $laratoast['afterShown'] }}
    }, // will be triggered after the toat has been shown
    beforeHide: function () {
        {{ $laratoast['beforeHide'] }}
    }, // will be triggered before the toast gets hidden
    afterHidden: function () {
        {{ $laratoast['afterHidden'] }}
    }  // will be triggered after the toast has been hidden

    });
    @endforeach
</script>
{{ session()->forget('laratoast') }}
