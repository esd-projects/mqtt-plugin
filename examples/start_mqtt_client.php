<?php


use ESD\Plugins\MQTT\MQTT;

require __DIR__ . '/../vendor/autoload.php';
enableRuntimeCoroutine();

$mqtt = new MQTT("localhost:8090");
$mqtt->setHandler(new \ESD\Plugins\MQTT\ExampleClass\MqttMessageHandle());
$mqtt->connect();
$topics['mqtttest/#'] = 2;
$mqtt->subscribe($topics);
$mqtt->loop();