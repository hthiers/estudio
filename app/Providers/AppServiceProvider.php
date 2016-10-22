<?php

namespace Judici\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('langUpC', function($expression) {
            return "<?php echo ucwords(trans($expression)); ?>";
        });
        Blade::directive('langUpc', function($expression) {
            return "<?php echo ucfirst(trans($expression)); ?>";
        });
        Blade::directive('langUPC', function($expression) {
            return "<?php echo strtoupper(trans($expression)); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
