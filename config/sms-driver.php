<?php

return [
    'driver' => Aigletter\SmsSender\Drivers\SmsRuDriver::class,
    'options' => [
        'key' => env('SSM_SENDER_KEY'),
    ]
];