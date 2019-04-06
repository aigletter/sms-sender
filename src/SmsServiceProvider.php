<?php

namespace Aigletter\SmsSender;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function boot()
    {

        //Указываем, что файлы из папки config должны быть опубликованы при установке
        $this->publishes([__DIR__ . '/../config/' => config_path() . '/']);

        //Так же публикуем тестовый виджет с каталогом для пользовательских виджетов
        $this->publishes([__DIR__ . '/../app/' => app_path() . '/']);
    }


    public function register()
    {

        App::singleton('sms', function(){
            return new \Aigletter\SmsSender\Sms();
        });

    }
}
