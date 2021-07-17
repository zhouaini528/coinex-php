<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Perpetual;

use Lin\Coinex\Request;

class Market extends Request
{

    /**
     *GET https://api.coinex.com/perpetual/v1/market/list
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/market/list';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/limit_config
     * */
    public function getLimitConfig(array $data=[]){
        $this->type='GET';
        $this->path='/market/limit_config';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/ticker
     * */
    public function getTicker(array $data=[]){
        $this->type='GET';
        $this->path='/market/ticker';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/ticker/all
     * */
    public function getTickerAll(array $data=[]){
        $this->type='GET';
        $this->path='/market/ticker/all';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/depth
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/market/depth';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * @param array $data
     * @param string $functionName
     * @return array
     */
    public function getMarketDepthRequestParams(array $data,string $functionName){
        $this->type='GET';
        $this->path='/market/depth';
        $this->data=$data;
        return $this->getRequestParam($functionName);
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/deals
     * */
    public function getDeals(array $data=[]){
        $this->type='GET';
        $this->path='/market/deals';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/funding_history
     * */
    public function getFundingHistory(array $data=[]){
        $this->type='GET';
        $this->path='/market/funding_history';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/user_deals
     * */
    public function getUserDeals(array $data=[]){
        $this->type='GET';
        $this->path='/market/user_deals';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/market/kline
     * */
    public function getKline(array $data=[]){
        $this->type='GET';
        $this->path='/market/kline';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/market/adjust_leverage
     * */
    public function postAdjustLeverage(array $data=[]){
        $this->authorization=true;
        $this->type='POST';
        $this->path='/market/adjust_leverage';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/market/position_expect
     * */
    public function postPositionExpect(array $data=[]){
        $this->authorization=true;
        $this->type='POST';
        $this->path='/market/position_expect';
        $this->data=$data;
        return $this->exec();
    }
}
