<?php
/**
 * @author lin <465382251@qq.com>
 * */
use Lin\Coinex\CoinexExchange;
use Lin\Coinex\CoinexPerpetual;

require __DIR__ .'../../../vendor/autoload.php';

$spot=new CoinexExchange();
$futures=new CoinexPerpetual();

//Mode one
$spot_market=$spot->market(['async'=>'fun1'])->getDepth([
    'market'=>'BTCUSDT',
    'merge'=>'0.1'
]);

$futures_market=$futures->market(['async'=>'fun2'])->getDepth([
    'market'=>'BTCUSD',
    'merge'=>'0.1',
    'limit'=>'10'
]);

try {
    $result=$spot->sendAsync([$spot_market,$futures_market]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}


//Mode two
try {
    $result=$spot->sendAsync([
        $spot->market(['async'=>'fun1'])->getDepth([
            'market'=>'BTCUSDT',
            'merge'=>'0.1'
        ]),
        $futures->market(['async'=>'fun2'])->getDepth([
            'market'=>'BTCUSD',
            'merge'=>'0.1',
            'limit'=>'10'
        ])
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}












