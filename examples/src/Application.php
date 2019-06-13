<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/5/7
 * Time: 10:44
 */

namespace ESD\Plugins\MQTT\ExampleClass;

use ESD\Go\GoApplication;
use ESD\Plugins\MQTT\MqttPlugin;

class Application
{
    /**
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     * @throws \ESD\Core\Exception
     * @throws \ESD\Core\Plugins\Config\ConfigException
     * @throws \ReflectionException
     */
    public static function main()
    {
        $application = new GoApplication();
        $application->addPlug(new MqttPlugin());
        $application->run();
    }
}