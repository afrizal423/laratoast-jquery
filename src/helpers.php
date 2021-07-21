<?php
if (! function_exists('laratoast')){
    function laratoast($message = null, $title = null, $type = null, $position = null, array $options = []){
        $toaster =  app('laratoast');

        if (! is_null($message)){
            return $toaster->toast($message, $title, $type, $position);
        }

        return $toaster;
    }
}

if (! function_exists('laratoast_js')) {
    /**
     * @return string
     */
    function laratoast_js(): string
    {
        return '<script type="text/javascript" src="/vendor/laratoast/js/jquery.toast.min.js"></script>';
    }
}

if (! function_exists('laratoast_css')) {
    /**
     * @return string
     */
    function laratoast_css(): string
    {
        return '<link rel="stylesheet" type="text/css" href="/vendor/laratoast/css/jquery.toast.min.css">';
    }
}

if (! function_exists('laratoast_render')) {
    /**
     * @return string
     */
    function laratoast_render()
    {
        return view('vendor.laratoast.laratoast');
    }
}

if (! function_exists('laratoast_jquery')) {
    /**
     * @return string
     */
    function laratoast_jquery(): string
    {
        return '<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>';
    }
}
