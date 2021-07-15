### It is recommended that you read the official document first

Coinex 现货文档 [https://github.com/coinexcom/coinex_exchange_api/wiki](https://github.com/coinexcom/coinex_exchange_api/wiki)

Coinex 期货文档 [https://github.com/coinexcom/coinex_perpetual_api](https://github.com/coinexcom/coinex_perpetual_api)

所有接口方法的初始化都与coinex提供的方法相同。更多细节 [src/api](https://github.com/zhouaini528/coinex-php/tree/master/src/Api)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/coinex-php/blob/master/README_CN.md)

QQ交流群：668421169

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php) 支持[Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README_CN.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) 支持[Websocket](https://github.com/zhouaini528/okex-php/blob/master/README_CN.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) 支持[Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README_CN.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) 支持[Websocket](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

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

**如果没有找到你想要的交易所SDK你可以告诉我，我来加入它们。**

#### Installation
```
composer require linwj/coinex
```

Support for more request Settings
```php
use Lin\Coinex\CoinexExchange;
$coinex=new CoinexExchange();

//支持更多的请求设置
$coinex->setOptions([
    //设置请求过期时间，默认60s
    'timeout'=>10,
    
    //https://github.com/guzzle/guzzle
    'proxy'=>[],

    //https://www.php.net/manual/en/book.curl.php
    'curl'=>[],
]);
```

### 现货交易

市场 API [More](https://github.com/zhouaini528/coinex-php/blob/master/tests/exchange/market.php)

```php
$conex=new CoinexExchange();

try {
    $result=$conex->market()->getMarketList();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->market()->getMarketTicker([
        'market'=>'BCHBTC'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->market()->getMarketDepth([
        'market'=>'BCHBTC',
        'merge'=>'0.1'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->market()->getMarketKline([
        'market'=>'BCHBTC',
        'type'=>'4hour'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```

账户 API [More](https://github.com/zhouaini528/coinex-php/blob/master/tests/exchange/account.php)

```php
$conex=new CoinexExchange($key,$secret);

try {
    $result=$conex->account()->getBalanceInfo([
        //You can 'access_id' and 'tonxe' leave it blank
        'access_id'=>$key,
        'tonce'=>time().'000',
    ]);

    //You can 'access_id' and 'tonxe' leave it blank
    $result=$conex->account()->getBalanceInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$conex->account()->getBalanceCoinWithdraw();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$conex->account()->getCreditInfo();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```


交易 API [More](https://github.com/zhouaini528/coinex-php/blob/master/tests/exchange/trading.php)

```php
$conex=new CoinexExchange($key,$secret);

try {
    //You can 'access_id' and 'tonxe' leave it blank
    $result=$conex->trading()->postMarket([
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
    $result=$conex->trading()->getStatus([
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
    $result=$conex->trading()->deletePending([
        'id'=>'9999999',
        'market'=>'BCHBTC',
        'type'=>'0'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
```


保证金 API [More](https://github.com/zhouaini528/coinex-php/blob/master/tests/exchange/margin.php)

```php
$conex=new CoinexExchange($key,$secret);

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
```

More Test [more](https://github.com/zhouaini528/coinex-php/blob/master/tests/exchange)

### 期货交易
