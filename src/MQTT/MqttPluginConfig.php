<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/13
 * Time: 10:48
 */

namespace ESD\Plugins\MQTT;


use ESD\Core\Plugins\Config\BaseConfig;
use ESD\Plugins\MQTT\Auth\EasyMqttAuth;

class MqttPluginConfig extends BaseConfig
{
    const key = "mqtt";
    /**
     * @var string
     */
    protected $mqttAuthClass = EasyMqttAuth::class;

    public function __construct()
    {
        parent::__construct(self::key);
    }

    /**
     * @return string
     */
    public function getMqttAuthClass(): string
    {
        return $this->mqttAuthClass;
    }

    /**
     * @param string $mqttAuthClass
     */
    public function setMqttAuthClass(string $mqttAuthClass): void
    {
        $this->mqttAuthClass = $mqttAuthClass;
    }
}