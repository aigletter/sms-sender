<?php

namespace Aigletter\SmsSender;

use Aigletter\SmsSender\Contract\ContractSmsDriver;

class SmsSender
{
    protected $driver;

    public function __construct(ContractSmsDriver $driver) {
        $this->driver = $driver;
    }

    public function __call($name, $arguments) {
        if (method_exists($this->driver, $name)) {
            return call_user_func_array([$this->driver, $name], $arguments);
        }
    }
}
