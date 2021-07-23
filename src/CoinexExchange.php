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
    function account(array $options=[]){
        return new Account(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function common(array $options=[]){
        return new Common(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function cntract(array $options=[]){
        return new Contract(array_merge($this->init(),$options));
    }

    /**
     *
     * */
    function margin(array $options=[]){
        return new Margin(array_merge($this->init(),$options));
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
    function trading(array $options=[]){
        return new Trading(array_merge($this->init(),$options));
    }

    /**
     * @return array
     * */
    function sendAsync(array $options=[]){
        return (new Request($this->init()))->exec(['async'=>$options]);
    }
}
