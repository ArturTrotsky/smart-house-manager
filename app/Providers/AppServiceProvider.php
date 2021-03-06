<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Not used
        Blade::directive('generateIP', function () {
            return rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' .
                rand(0, 255) . ':' . rand(1, 65535);
        });

        Blade::directive('convert', function ($value) {
            return "<?php echo ($value == 1) ? 'yes' : 'no';?>";
        });
    }
}
