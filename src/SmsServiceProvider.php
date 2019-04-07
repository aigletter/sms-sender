<?php

namespace Aigletter\SmsSender;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $dir = dirname(__DIR__);
        //Указываем, что файлы из папки config должны быть опубликованы при установке
        //$this->publishes([$dir . '/config/sms-driver.php' => config_path('sms-driver.php')]);

        //Так же публикуем драйвер по умолчанию
        //$this->publishes([$dir . '/app/' => app_path() . '/']);

        $this->mergeConfigFrom(__DIR__ . '/../config/sms-driver.php', 'sms-driver');
    }


    public function register()
    {
        /*$config = $app->make(config('nutnet-laravel-sms.provider'), [
            'options' => config('nutnet-laravel-sms.provider_options')
        ]);*/

        App::singleton('smsSender', function($app){
            return new \Aigletter\SmsSender\SmsSender($app->make(config('sms-driver.driver'), [
                'options' => config('sms-driver.options')
            ]));
        });

        /*App::bind('sms', function() {
            return new Sms();
        });*/

    }
}
