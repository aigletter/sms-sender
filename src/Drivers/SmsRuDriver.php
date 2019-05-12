<?php

namespace Aigletter\SmsSender\Drivers;


use Aigletter\SmsSender\Contract\ContractSmsDriver;
use mysql_xdevapi\Exception;

class SmsRuDriver extends AbstractDriver
{
    protected $domain = 'https://sms.ru';
    
    protected $key;

    public function send($message) {
        $result = null;
        // TODO
        if (!empty($this->to)) {
            $url = $this->domain . '/sms/send';
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                "api_id" => $this->key,
                "to" => implode(',', $this->to),
                "msg" => $message,
                /*
                // Если вы хотите отправлять разные тексты на разные номера, воспользуйтесь этим кодом. В этом случае to и msg нужно убрать.
                "multi" => array( // до 100 штук за раз
                    "79851111111"=> iconv("windows-1251", "utf-8", "Привет 1"), // Если приходят крякозябры, то уберите iconv и оставьте только "Привет!",
                    "74991111111"=> iconv("windows-1251", "utf-8", "Привет 2")
                ),
                */
                "json" => 1 // Для получения более развернутого ответа от сервера
            )));
            $result = curl_exec($ch);
            curl_close($ch);
        }

        return $result;
    }
}