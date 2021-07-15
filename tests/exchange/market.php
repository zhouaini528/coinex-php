<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexExchange;

require __DIR__ .'../../../vendor/autoload.php';

$conex=new CoinexExchange();

//You can set special needs
$conex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$conex->market()->getMarketList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->market()->getMarketTicker([
        'market'=>'BCHBTC'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->market()->getMarketDepth([
        'market'=>'BCHBTC',
        'merge'=>'0.1'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->market()->getMarketKline([
        'market'=>'BCHBTC',
        'type'=>'4hour'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


