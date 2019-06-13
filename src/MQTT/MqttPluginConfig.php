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
     * 允许匿名登录
     * @var bool
     */
    protected $allowAnonymousAccess = true;
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

    /**
     * @return bool
     */
    public function isAllowAnonymousAccess(): bool
    {
        return $this->allowAnonymousAccess;
    }

    /**
     * @param bool $allowAnonymousAccess
     */
    public function setAllowAnonymousAccess(bool $allowAnonymousAccess): void
    {
        $this->allowAnonymousAccess = $allowAnonymousAccess;
    }
}