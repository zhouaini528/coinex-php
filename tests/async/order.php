<?php
/**
 * @author lin <465382251@qq.com>
 * */
use Lin\Coinex\CoinexExchange;
use Lin\Coinex\CoinexPerpetual;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$spot=new CoinexExchange($key,$secret);
$futures=new CoinexPerpetual($key,$secret);

//Mode one
$spot_order=$spot->trading(['async'=>'fun1'])->postMarket([
    //'access_id'=>'xxxxx',
    //'tonce'=>time().'000',
    'market'=>'BCHBTC',
    'type'=>'sell',
    'amount'=>'1',
    'client_id'=>'99999999',
]);

$futures_order=$futures->order(['async'=>'fun2'])->postPutMarket([
    'market'=>'BTCUSD',
    'side'=>'2',
    'amount'=>'10',
    'client_id'=>'xxxxxx',
]);

try {
    $result=$spot->sendAsync([$spot_order,$futures_order]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}


//Mode two
try {
    $result=$spot->sendAsync([
        $spot->trading(['async'=>'fun1'])->postMarket([
            //'access_id'=>'xxxxx',
            //'tonce'=>time().'000',
            'market'=>'BCHBTC',
            'type'=>'sell',
            'amount'=>'1',
            'client_id'=>'99999999',
        ]),
        $futures->order(['async'=>'fun2'])->postPutMarket([
            'market'=>'BTCUSD',
            'side'=>'2',
            'amount'=>'10',
            'client_id'=>'xxxxxx',
        ])
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}












