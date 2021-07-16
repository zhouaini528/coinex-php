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
    function asset(){
        return new Asset($this->init());
    }

    /**
     *
     * */
    function market(){
        return new Market($this->init());
    }

    /**
     *
     * */
    function order(){
        return new Order($this->init());
    }

    /**
     *
     * */
    function position(){
        return new Position($this->init());
    }

    /**
     *
     * */
    function system(){
        return new System($this->init());
    }
}
