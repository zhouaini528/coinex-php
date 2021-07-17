<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexPerpetual;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$coinex=new CoinexPerpetual($key,$secret);

//You can set special needs
$coinex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$coinex->position()->getPending([
        'market'=>'BTCUSD',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->position()->getFunding([
        'market'=>'BTCUSD',
        'offset'=>'10',
        'limit'=>'10'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->position()->postAdjustMargin([
        'market'=>'BTCUSD',
        'amount'=>'1',
        'type'=>'1',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}


