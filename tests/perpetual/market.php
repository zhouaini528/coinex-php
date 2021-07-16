<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexPerpetual;

require __DIR__ .'../../../vendor/autoload.php';

$conex=new CoinexPerpetual();

//You can set special needs
$conex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$conex->market()->getList();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->market()->getLimitConfig();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->market()->getTicker([
        'market'=>'BTCUSD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->market()->getTickerAll();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->market()->getDepth([
        'market'=>'BTCUSD',
        'merge'=>'0.1',
        'limit'=>'10'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->market()->getDeals([
        'market'=>'BTCUSD',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
