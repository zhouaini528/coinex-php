<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexExchange;

require __DIR__ .'../../../vendor/autoload.php';

$coinex=new CoinexExchange();

//You can set special needs
$coinex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$coinex->market()->getList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$coinex->market()->getTicker([
        'market'=>'BCHBTC'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$coinex->market()->getDepth([
        'market'=>'BCHBTC',
        'merge'=>'0.1'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$coinex->market()->getKline([
        'market'=>'BCHBTC',
        'type'=>'4hour'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


