<?php

/**
 * MQTT Client
 */


namespace ESD\Plugins\MQTT;

/**
 * Swoole Client
 *
 * @package ESD\Plugins\MQTT
 */
class SwooleClient
{
    /**
     * swoole Connection Resource
     *
     * @var resource
     */
    protected $client;
    /**
     * Server Address
     *
     * @var string
     */
    protected $address;


    public function __construct($address)
    {
        $this->address = $address;
        $this->client = new \Swoole\Coroutine\Client(SWOOLE_SOCK_TCP);
        $this->client->set([
            'open_mqtt_protocol' => true,
            'package_max_length' => 2000000,  //协议最大长度
        ]);
    }

    public function __destruct()
    {
        $this->close();
    }

    /**
     * Get Server Address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * create socket
     * @param $onConnect
     * @param $onReceive
     * @param $onError
     * @param $onClose
     * @return void
     */
    public function connect($onConnect, $onReceive, $onError, $onClose)
    {
        Debug::Log(Debug::DEBUG, 'swoole_connect(): connect to=' . $this->address);
        $arr = parse_url($this->address);
        if (!$this->client->connect($arr['host'], $arr['port'])) {
            $onError();
        } else {
            $onConnect();
            go(function () use ($onClose, $onReceive) {
                while (true) {
                    $data = $this->client->recv();
                    if ($data === false) {
                        $onClose();
                        break;
                    } else {
                        $onReceive($this->client, $data);
                    }
                }
            });
        }
    }

    /**
     * @param $packet
     * @param $packet_size
     * @return mixed
     */
    public function send($packet, $packet_size)
    {
        Debug::Log(Debug::DEBUG, "socket_write(length={$packet_size})", $packet);
        $this->client->send($packet);
        return $packet_size;
    }

    /**
     * Close socket
     *
     * @return void
     */
    public function close()
    {
        if ($this->isConnected()) {
            $this->client->close();
        }
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return $this->client->isConnected();
    }
}
