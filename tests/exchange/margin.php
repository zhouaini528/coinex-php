<?php
/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinex\CoinexExchange;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$conex=new CoinexExchange($key,$secret);

//You can set special needs
$conex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
]);


try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$conex->margin()->getAccount([
        'market'=>'BCHBTC'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->margin()->getMarket();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
