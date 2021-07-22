<?php
namespace Afrizalmy\Laratoast;

class Laratoast
{
    public $toast;
    public function __construct()
    {
        $this->toast = collect();
    }

    public function toast($message = null, $title =null, $type = null, $position = null, array $optionsnya = [])
    {
        if (is_null($message)){
            return $this;
        }

        $position = $position ?: 'bottom-right';
        $options = [
            'text' => $message,
            'heading' => $title,
            'icon' => $type ?: 'info',
            'position' => $position
        ];

        $getToastOptions = config('laratoast', true);
        $options=array_merge($options,$optionsnya);
        $this->toast->push(array_merge($getToastOptions['options'],$options));

        return $this->flash();

    }

    public function info($message, $title = null, $position = null, array $options = [])
    {
        return $this->toast($message, $title, 'info', $position, $options);
    }

    public function success($message, $title = null, $position = null, array $options = [])
    {
        return $this->toast($message, $title, 'success', $position, $options);
    }

    public function warning($message, $title = null, $position = null, array $options = [])
    {
        return $this->toast($message, $title, 'warning', $position, $options);
    }

    public function error($message, $title = null, $position = null, array $options = [])
    {
        return $this->toast($message, $title, 'error', $position, $options);
    }

    public function flash()
    {
        app()->session->flash('laratoast', $this->toast);

        return $this;
    }

    public function show()
    {
        $script = '<script type="text/javascript">';
        $messages = app()->session->get('laratoast');

        if (! $messages) $messages = [];

        $tmp ='';
        foreach ($messages as $message) {
            $script = '<script type="text/javascript">';
            $script .= '$.toast(';
            $script .= json_encode($message);
            $script .= ');';
            $script .= '</script>';
            $tmp .= $script;
        }
        // $script .= '</script>';
        session()->forget('laratoast');
        return $tmp;
    }
}
