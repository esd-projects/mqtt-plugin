<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/13
 * Time: 16:50
 */

namespace ESD\Plugins\MQTT\ExampleClass\Controller;

use ESD\Go\GoController;
use ESD\Plugins\EasyRoute\Annotation\MqttController;
use ESD\Plugins\EasyRoute\Annotation\MqttMapping;

/**
 * @MqttController()
 * Class MqttTestController
 * @package ESD\Plugins\MQTT\ExampleClass\Controller
 */
class MqttTestController extends GoController
{
    /**
     * @MqttMapping()
     * @return string
     */
    public function test()
    {
        return "hello";
    }
}