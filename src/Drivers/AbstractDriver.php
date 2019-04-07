<?php
/**
 * Created by PhpStorm.
 * User: aigletter
 * Date: 06.04.19
 * Time: 23:38
 */

namespace Aigletter\SmsSender\Drivers;


use Aigletter\SmsSender\Contract\ContractSmsDriver;

abstract class AbstractDriver implements ContractSmsDriver
{
    /**
     * @var array
     */
    protected $to;

    /**
     * AbstractDriver constructor.
     *
     * @param array $options
     */
    public function __construct($options=[]) {
        foreach ($options as $key=>$option) {
            if (property_exists($this, $key)) {
                if (is_callable($option)) {
                    $option = call_user_func($option);
                }
                $this->{$key} = $option;
            }
        }
    }

    /*public function build() {

    }*/

    /*public function send($message) {
        $this->build();
    }*/

    /**
     * @param array|string $to
     *
     * @return $this|ContractSmsDriver
     */
    public function to($to) {
        if (!is_string($to)) {
            $to = explode(',', $to);
        }
        $this->to[] = $to;

        return $this;
    }
}