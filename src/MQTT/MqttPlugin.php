<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/13
 * Time: 9:36
 */

namespace ESD\Plugins\MQTT;

use ESD\Core\Context\Context;
use ESD\Core\PlugIn\AbstractPlugin;
use ESD\Plugins\MQTT\Auth\MqttAuth;
use ESD\Plugins\Pack\PackPlugin;

class MqttPlugin extends AbstractPlugin
{
    /**
     * @var MqttPluginConfig
     */
    private $mqttPluginConfig;

    /**
     * MqttPlugin constructor.
     * @param MqttPluginConfig|null $mqttPluginConfig
     * @throws \ReflectionException
     */
    public function __construct(?MqttPluginConfig $mqttPluginConfig = null)
    {
        parent::__construct();
        Debug::Disable();
        $this->atBefore(PackPlugin::class);
        if ($mqttPluginConfig == null) {
            $mqttPluginConfig = new MqttPluginConfig();
        }
        $this->mqttPluginConfig = $mqttPluginConfig;
    }

    /**
     * @param Context $context
     * @return mixed|void
     * @throws \ReflectionException
     * @throws \ESD\Core\Plugins\Config\ConfigException
     */
    public function init(Context $context)
    {
        parent::init($context);
        $this->mqttPluginConfig->merge();
        $authRc = new \ReflectionClass($this->mqttPluginConfig->getMqttAuthClass());
        $authAmpl = $authRc->newInstance();
        $this->setToDIContainer(MqttAuth::class, $authAmpl);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "MQTT";
    }

    /**
     * 初始化
     * @param Context $context
     */
    public function beforeServerStart(Context $context)
    {
        return;
    }

    /**
     * 在进程启动前
     * @param Context $context
     */
    public function beforeProcessStart(Context $context)
    {
        $this->ready();
    }
}