### It is recommended that you read the official document first

Coinex spot docs [https://github.com/coinexcom/coinex_exchange_api/wiki](https://github.com/coinexcom/coinex_exchange_api/wiki)

Coinex futures docs [https://github.com/coinexcom/coinex_perpetual_api](https://github.com/coinexcom/coinex_perpetual_api)

All interface methods are initialized the same as those provided by Coinex. See details [src/api](https://github.com/zhouaini528/coinex-php/tree/master/src/Api)

Most of the interface is now complete, and the user can continue to extend it based on my design, working with me to improve it.

[中文文档](https://github.com/zhouaini528/coinex-php/blob/master/README_CN.md)

### Other exchanges API

[Exchanges](https://github.com/zhouaini528/exchanges-php) It includes all of the following exchanges and is highly recommended.

[Bitmex](https://github.com/zhouaini528/bitmex-php) Support [Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) Support [Websocket](https://github.com/zhouaini528/okex-php/blob/master/README.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) Support [Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) Support [Websocket](https://github.com/zhouaini528/binance-php/blob/master/README.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/Mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/bitfinex-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

[Gate](https://github.com/zhouaini528/gate-php)

[Bigone](https://github.com/zhouaini528/bigone-php)

[Crex24](https://github.com/zhouaini528/crex24-php)

[Bybit](https://github.com/zhouaini528/bybit-php)

[Coinbene](https://github.com/zhouaini528/coinbene-php)

[Bitget](https://github.com/zhouaini528/bitget-php)

[Poloniex](https://github.com/zhouaini528/poloniex-php)

[Coinex](https://github.com/zhouaini528/coinex-php)

**If you don't find the exchange SDK you want, you can tell me and I'll join them.**

#### Installation
```
composer require linwj/coinex
```

Support for more request Settings
```php
//spot
use Lin\Coinex\CoinexExchange;
$coinex=new CoinexExchange();

//future
use Lin\Coinex\CoinexPerpetual;
$coinex=new CoinexPerpetual();

//You can set special needs
$coinex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

    //https://github.com/guzzle/guzzle
    'proxy'=>[],

    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],
]);
```

### Exchange Spot

Market API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Exchange/Market.php)

```php
$coinex=new CoinexExchange();

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
```

Account API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Exchange/Account.php)

```php
$coinex=new CoinexExchange($key,$secret);

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
```


Trading API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Exchange/Trading.php)

```php
$coinex=new CoinexExchange($key,$secret);

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$coinex->trading()->postMarket([
        //'access_id'=>'xxxxx',
        //'tonce'=>time().'000',
        'market'=>'BCHBTC',
        'type'=>'sell',
        'amount'=>'1',
        'client_id'=>'99999999',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$coinex->trading()->getStatus([
        //'access_id'=>'xxxxx',
        //'tonce'=>time().'000',
        'id'=>'99999999',
        'market'=>'BCHBTC',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$coinex->trading()->deletePending([
        'id'=>'9999999',
        'market'=>'BCHBTC',
        'type'=>'0'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```


Margin API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Exchange/Margin.php)

```php
$coinex=new CoinexExchange($key,$secret);

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$coinex->margin()->getAccount([
        'market'=>'BCHBTC'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$coinex->margin()->getMarket();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

More Test [more](https://github.com/zhouaini528/coinex-php/blob/master/tests/exchange)

### Perpetual Futures


Market API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Perpetual/Market.php)

```php
$coinex=new CoinexPerpetual();

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
```

Order API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Perpetual/Order.php)

```php
$coinex=new CoinexPerpetual($key,$secret);

try {
    $result=$coinex->order()->postPutMarket([
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
    $result=$coinex->order()->postPutStopLimit([
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
    $result=$coinex->order()->getStatus([
        'market'=>'BTCUSD',
        'order_id'=>'9999999',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$coinex->order()->postCancel([
        'market'=>'BTCUSD',
        'order_id'=>'9999999',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

Position API [More](https://github.com/zhouaini528/coinex-php/tree/master/src/Api/Perpetual/Position.php)

```php
$coinex=new CoinexPerpetual($key,$secret);

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
```

More Test [more](https://github.com/zhouaini528/coinex-php/tree/master/tests/perpetual)



