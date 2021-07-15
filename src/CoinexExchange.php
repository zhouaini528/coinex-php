<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex;

use Lin\Coinex\Api\Exchange\Account;
use Lin\Coinex\Api\Exchange\Common;
use Lin\Coinex\Api\Exchange\Contract;
use Lin\Coinex\Api\Exchange\Margin;
use Lin\Coinex\Api\Exchange\Market;
use Lin\Coinex\Api\Exchange\Trading;


class CoinexExchange
{
    protected $key;
    protected $secret;
    protected $host;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $host='https://api.coinex.com/v1'){
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

            'platform'=>'exchange',
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
    function account(){
        return new Account($this->init());
    }

    /**
     *
     * */
    function common(){
        return new Common($this->init());
    }

    /**
     *
     * */
    function cntract(){
        return new Contract($this->init());
    }

    /**
     *
     * */
    function margin(){
        return new Margin($this->init());
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
    function trading(){
        return new Trading($this->init());
    }
}
