<?php

namespace Lin\Coinex;

class CoinexMix extends Request
{
    protected $spot; //现货类
    protected $futures; //合约类

    /**
     * CoinexMix constructor.
     * @param $spot
     * @param $futures
     */
    function __construct($spot,$futures){
        $this->spot=$spot;
        $this->futures=$futures;
    }

    /**
     * 异步同时获取期货和现货盘口
     * @param array $spotParam
     * @param array $futuresParam
     * @param string $spotName
     * @param string $futuresName
     * @return array
     * @throws Exceptions\Exception
     */
    function mixGetMarketDepthAsync(array $spotParam,array $futuresParam,string $spotName,string $futuresName){
        $requestParams = [];
        $requestParams[] = $this->spot->market()->getMarketDepthRequestParams($spotParam,$spotName);
        $requestParams[] = $this->futures->market()->getMarketDepthRequestParams($futuresParam,$futuresName);
        return $this->execAsync($requestParams);
    }

    /**
     * 异步现货，期货同时下单
     * @param array $spotData
     * @param array $futuresData
     * @param string $spotName
     * @param string $futuresName
     * @return array
     * @throws Exceptions\Exception
     */
    function mixPostOrderAsync(array $spotData,array $futuresData,string $spotName,string $futuresName){
        $requestParams = [];
        $requestParams[] = $this->spot->trading()->postLimitRequestParams($spotData,$spotName);
        $requestParams[] = $this->futures->order()->postPutLimitRequestParams($futuresData,$futuresName);
        return $this->execAsync($requestParams);
    }
}