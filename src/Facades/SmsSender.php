<?php

namespace Aigletter\SmsSender\Facades;

use Aigletter\SmsSender\SmsSender as Sender;
use Illuminate\Support\Facades\Facade;

class SmsSender extends Facade
{
    protected static function getFacadeAccessor() {
        return 'smsSender';
    }
}