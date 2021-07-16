<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexExchange;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$coinex=new CoinexExchange($key,$secret);

//You can set special needs
$coinex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);

try {
    $result=$coinex->account()->getBalanceInfo([
        //You can 'access_id' and 'tonxe' leave it blank
        'access_id'=>$key,
        'tonce'=>time().'000',
    ]);

    //You can 'access_id' and 'tonxe' leave it blank
    $result=$coinex->account()->getBalanceInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$coinex->account()->getBalanceCoinWithdraw();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$coinex->account()->getCreditInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


