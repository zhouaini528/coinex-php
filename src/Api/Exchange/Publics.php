<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\SpotV3;

use Lin\Coinex\Request;

class Publics extends Request
{
    /**
     *HTTP GET /api/v3/spot/instruments/trade_pair_list
     * */
    public function getTradePairList(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/trade_pair_list';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/trade_pair_one?instrument_id=BTC%2FUSDT
     * */
    public function getTradePairOne(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/trade_pair_one';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/depth?instrument_id=BTC%2FUSDT&depth=5
     * */
    public function getDepth(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/depth';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/ticker_list
     * */
    public function getTickerList(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/ticker_list';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/ticker_one?instrument_id=BTC%2FUSDT
     *
     * */
    public function getTickerOne(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/ticker_one';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/candles?instrument_id=BTC%2FUSDT&period=1&start_time=&end_time=
     * */
    public function getCandles(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/candles';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/trade_list?instrument_id=BTC%2FUSDT
     * */
    public function getTradeList(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/trade_list';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/instruments/rate_list
     * */
    public function getRateList(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/instruments/rate_list';
        $this->data=$data;
        return $this->exec();
    }


    /**
     *
     * */
    /*public function get(array $data=[]){
        $this->type='GET';
        $this->path='';
        $this->data=$data;
        return $this->exec();
    }*/
}
