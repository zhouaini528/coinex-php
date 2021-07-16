<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexPerpetual;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$conex=new CoinexPerpetual($key,$secret);

//You can set special needs
$conex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$conex->order()->postPutMarket([
        'market'=>'BTCUSD',
        'side'=>'2',
        'amount'=>'10',
        'client_id'=>'xxxxxx',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->order()->postPutStopLimit([
        'market'=>'BTCUSD',
        'side'=>'2',
        'amount'=>'10',
        'client_id'=>'xxxxxx',

        'stop_type'=>'2',
        'stop_price'=>'10000',
        'price'=>'9000',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->order()->getStatus([
        'market'=>'BTCUSD',
        'order_id'=>'9999999',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$conex->order()->postCancel([
        'market'=>'BTCUSD',
        'order_id'=>'9999999',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

