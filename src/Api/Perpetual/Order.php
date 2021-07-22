<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Perpetual;

use Lin\Coinex\Request;

class Order extends Request
{
    //Use sha256 algorithm signature by default
    protected $authorization=true;

    /**
     *POST https://api.coinex.com/perpetual/v1/order/put_limit
     * */
    public function postPutLimit(array $data=[]){
        $this->type='POST';
        $this->path='/order/put_limit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * @param array $data
     * @param string $functionName
     * @return array
     */
    public function postPutLimitRequestParams(array $data,string $functionName)
    {
        $this->type='POST';
        $this->path='/order/put_limit';
        $this->data=$data;
        return $this->getRequestParam($functionName);
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/put_market
     * */
    public function postPutMarket(array $data=[]){
        $this->type='POST';
        $this->path='/order/put_market';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/put_stop_limit
     * */
    public function postPutStopLimit(array $data=[]){
        $this->type='POST';
        $this->path='/order/put_stop_limit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/cancel
     * */
    public function postCancel(array $data=[]){
        $this->type='POST';
        $this->path='/order/cancel';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/cancel_all
     * */
    public function postCancelAll(array $data=[]){
        $this->type='POST';
        $this->path='/order/cancel_all';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/cancel_stop
     * */
    public function postCancelStop(array $data=[]){
        $this->type='POST';
        $this->path='/order/cancel_stop';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/cancel_stop_all
     * */
    public function postCancelStopAll(array $data=[]){
        $this->type='POST';
        $this->path='/order/cancel_stop_all';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/order/pending
     * */
    public function getPending(array $data=[]){
        $this->type='GET';
        $this->path='/order/pending';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/order/finished
     * */
    public function getFinished(array $data=[]){
        $this->type='GET';
        $this->path='/order/finished';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/order/stop_pending
     * */
    public function getStopPending(array $data=[]){
        $this->type='GET';
        $this->path='/order/stop_pending';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/order/status
     * */
    public function getStatus(array $data=[]){
        $this->type='GET';
        $this->path='/order/status';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/close_limit
     * */
    public function postCloseLimit(array $data=[]){
        $this->type='POST';
        $this->path='/order/close_limit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/order/close_market
     * */
    public function postCloseMarket(array $data=[]){
        $this->type='POST';
        $this->path='/order/close_market';
        $this->data=$data;
        return $this->exec();
    }
}
