`<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/13
 * Time: 14:10
 */

namespace ESD\Plugins\MQTT\ExampleClass;


use ESD\Plugins\MQTT\Message;
use ESD\Plugins\MQTT\MessageHandler;
use ESD\Plugins\MQTT\MQTT;

class MqttMessageHandle implements MessageHandler
{

    public function connack(MQTT $mqtt, Message\CONNACK $connack_object)
    {
        // TODO: Implement connack() method.
    }

    public function disconnect(MQTT $mqtt)
    {
        // TODO: Implement disconnect() method.
    }

    public function suback(MQTT $mqtt, Message\SUBACK $suback_object)
    {
        // TODO: Implement suback() method.
    }

    public function unsuback(MQTT $mqtt, Message\UNSUBACK $unsuback_object)
    {
        // TODO: Implement unsuback() method.
    }

    public function publish(MQTT $mqtt, Message\PUBLISH $publish_object)
    {
        // TODO: Implement publish() method.
    }

    public function puback(MQTT $mqtt, Message\PUBACK $puback_object)
    {
        // TODO: Implement puback() method.
    }

    public function pubrec(MQTT $mqtt, Message\PUBREC $pubrec_object)
    {
        // TODO: Implement pubrec() method.
    }

    public function pubrel(MQTT $mqtt, Message\PUBREL $pubrel_object)
    {
        // TODO: Implement pubrel() method.
    }

    public function pubcomp(MQTT $mqtt, Message\PUBCOMP $pubcomp_object)
    {
        // TODO: Implement pubcomp() method.
    }
}