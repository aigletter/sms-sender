<?php

namespace Aigletter\SmsSender\Contract;

interface ContractSmsDriver
{
    /**
     * @param $message
     *
     * @return mixed
     */
    public function send($message);

    /**
     * @param string|array $to
     *
     * @return self
     */
    public function to($to);
}
