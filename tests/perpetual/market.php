<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexPerpetual;

require __DIR__ .'../../../vendor/autoload.php';

$coinex=new CoinexPerpetual();

//You can set special needs
$coinex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$coinex->market()->getList();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->market()->getLimitConfig();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->market()->getTicker([
        'market'=>'BTCUSD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->market()->getTickerAll();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->market()->getDepth([
        'market'=>'BTCUSD',
        'merge'=>'0.1',
        'limit'=>'10'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->market()->getDeals([
        'market'=>'BTCUSD',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
