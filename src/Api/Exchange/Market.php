<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Exchange;

use Lin\Coinex\Request;

class Market extends Request
{
    /**
     *GET https://api.coinex.com/v1/market/list
     * */
    public function getMarketList(array $data=[]){
        $this->type='GET';
        $this->path='/market/list';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/market/ticker?market=BCHBTC
     * */
    public function getMarketTicker(array $data=[]){
        $this->type='GET';
        $this->path='/market/ticker';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/market/depth
     * */
    public function getMarketDepth(array $data=[]){
        $this->type='GET';
        $this->path='/market/depth';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * @param array $data
     * @param string|null $functionName
     * @return array|bool
     */
    public function getMarketDepthRequestParams(array $data,string $functionName){
        $this->type='GET';
        $this->path='/market/depth';
        $this->data=$data;
        return $this->getRequestParam($functionName);
    }

    /**
     *GET https://api.coinex.com/v1/market/deals?market=BCHBTC
     * */
    public function getMarketDeals(array $data=[]){
        $this->type='GET';
        $this->path='/market/deals';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/market/kline?market=BCHBTC&type=1min
     * */
    public function getMarketKline(array $data=[]){
        $this->type='GET';
        $this->path='/market/kline';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/market/info
     * */
    public function getMarketInfo(array $data=[]){
        $this->type='GET';
        $this->path='/market/info';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/market/detail
     * */
    public function getMarketDetail(array $data=[]){
        $this->type='GET';
        $this->path='/market/detail';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/amm/market
     * */
    public function getAmmMarket(array $data=[]){
        $this->type='GET';
        $this->path='/amm/market';
        $this->data=$data;
        return $this->exec();
    }
}
