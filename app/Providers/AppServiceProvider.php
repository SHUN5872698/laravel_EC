<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 文字数デフォルト255のところを191に指定
         */
        Schema::defaultStringLength(191);

        /**
         * .envファイルの(APP_ENV=production)のとき、https接続を強制化
         */
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
