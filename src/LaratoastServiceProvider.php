<?php

namespace Afrizalmy\Laratoast;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaratoastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $file = __DIR__.'/helpers.php';

        if (file_exists($file)){
            require_once($file);
        }

        $this->mergeConfigFrom(
            __DIR__.'/config/laratoast.php', 'laratoast'
        );

        $this->app->singleton('laratoast', function () {
            return new Laratoast();
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'laratoast');

        $this->publishes([
            __DIR__ . '/config/laratoast.php' => config_path('laratoast.php'),
            __DIR__.'/assets/jquery.toast.min.css' => public_path('vendor/laratoast/css/jquery.toast.min.css'),
            __DIR__.'/assets/jquery.toast.min.js' => public_path('vendor/laratoast/js/jquery.toast.min.js'),
            __DIR__.'/views' => base_path('resources/views/vendor/laratoast')
            ]);

        $this->registerBladeDirectives();
    }

    /**
     * Get the services provider by the provider
     *
     * @return array
     */
    public function provides()
    {
        return ['laratoast'];
    }

    public function registerBladeDirectives()
    {
        Blade::directive('laratoast_css', function () {
            return '<?php echo laratoast_css(); ?>';
        });

        Blade::directive('laratoast_js', function () {
            return '<?php echo laratoast_js(); ?>';
        });

        Blade::directive('laratoast_render', function () {
            return '<?php echo laratoast_render(); ?>';
        });

        Blade::directive('laratoast_jquery', function () {
            return '<?php echo laratoast_jquery(); ?>';
        });
    }
}
