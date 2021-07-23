<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex;


use Lin\Coinex\Api\Perpetual\Asset;
use Lin\Coinex\Api\Perpetual\Market;
use Lin\Coinex\Api\Perpetual\Order;
use Lin\Coinex\Api\Perpetual\Position;
use Lin\Coinex\Api\Perpetual\System;

class CoinexPerpetual
{
    protected $key;
    protected $secret;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://api.coinex.com/perpetual/v1'){
        $this->key=$key;
        $this->secret=$secret;
        $this->host=$host;
    }

    /**
     *
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'host'=>$this->host,
            'options'=>$this->options,

            'platform'=>'perpetual',
            'version'=>'v1',
        ];

    }

    /**
     *
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }

    /**
     *
     * */
    function asset(array $options=[]){
        return new Asset(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function market(array $options=[]){
        return new Market(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function order(array $options=[]){
        return new Order(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function position(array $options=[]){
        return new Position(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function system(array $options=[]){
        return new System(array_merge($this->init(),$options));
    }

    /**
     * @return array
     * */
    function sendAsync(array $options=[]){
        return (new Request($this->init()))->exec(['async'=>$options]);
    }
}
