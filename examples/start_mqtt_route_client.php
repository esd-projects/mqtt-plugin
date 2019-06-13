<?php


use ESD\Coroutine\Co;
use ESD\Plugins\MQTT\Debug;
use ESD\Plugins\MQTT\ExampleClass\MqttMessageHandle;
use ESD\Plugins\MQTT\MQTT;

require __DIR__ . '/../vendor/autoload.php';
Co::enableCo();
enableRuntimeCoroutine();
Debug::Disable();

$messageHandle = new MqttMessageHandle();

$mqtt2 = new MQTT("localhost:8090");
$mqtt2->setHandler($messageHandle);
$mqtt2->connectAndLoop();

$mqtt2->publish("test", "test");

