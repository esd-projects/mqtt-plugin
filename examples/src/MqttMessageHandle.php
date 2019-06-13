<?php
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
        var_dump("connack");
    }

    public function disconnect(MQTT $mqtt)
    {
        var_dump("disconnect");
    }

    public function suback(MQTT $mqtt, Message\SUBACK $suback_object)
    {
        var_dump("suback");
    }

    public function unsuback(MQTT $mqtt, Message\UNSUBACK $unsuback_object)
    {
        var_dump("unsuback");
    }

    public function publish(MQTT $mqtt, Message\PUBLISH $publish_object)
    {
        print_r(["qos"=>$publish_object->getQos(),"ret"=>$publish_object->getRetain(),'publish'=>$publish_object->getMessage(),"msgid"=>$publish_object->getMsgID()]);
    }

    public function puback(MQTT $mqtt, Message\PUBACK $puback_object)
    {
        var_dump("puback");
    }

    public function pubrec(MQTT $mqtt, Message\PUBREC $pubrec_object)
    {
        var_dump("pubrec");
    }

    public function pubrel(MQTT $mqtt, Message\PUBREL $pubrel_object)
    {
        var_dump("pubrel");
    }

    public function pubcomp(MQTT $mqtt, Message\PUBCOMP $pubcomp_object)
    {
        var_dump("pubcomp");
    }

    public function pingreq(MQTT $mqtt, Message\PINGREQ $pubcomp_object)
    {
        var_dump("pingreq");
    }

    public function pingresp(MQTT $mqtt, Message\PINGRESP $pubcomp_object)
    {
        var_dump("pingresp");
    }
}