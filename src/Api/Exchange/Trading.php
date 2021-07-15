<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Exchange;

use Lin\Coinex\Request;

class Trading extends Request
{
    //Use 32-bit MD5 Algorithm Signature
    protected $authorization=true;

    /**
     *POST https://api.coinex.com/v1/order/limit
     * */
    public function postLimit(array $data=[]){
        $this->type='POST';
        $this->path='/order/limit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/order/limit/batch
     * */
    public function postLimitBatch(array $data=[]){
        $this->type='POST';
        $this->path='/order/limit/batch';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/order/market
     * */
    public function postMarket(array $data=[]){
        $this->type='POST';
        $this->path='/order/market';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/order/stop/limit
     * */
    public function postStopLimit(array $data=[]){
        $this->type='POST';
        $this->path='/order/stop/limit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/order/ioc
     * */
    public function postIoc(array $data=[]){
        $this->type='POST';
        $this->path='/order/ioc';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/order/pending
     * */
    public function getPending(array $data=[]){
        $this->type='GET';
        $this->path='/order/pending';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/order/finished
     * */
    public function getFinished(array $data=[]){
        $this->type='GET';
        $this->path='/order/finished';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/order/status
     * */
    public function getStatus(array $data=[]){
        $this->type='GET';
        $this->path='/order/status';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/order/status/batch
     * */
    public function getStatusBatch(array $data=[]){
        $this->type='GET';
        $this->path='/order/status/batch';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/order/deals
     * */
    public function getDeals(array $data=[]){
        $this->type='GET';
        $this->path='/order/deals';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/order/user/deals
     * */
    public function getUserDeals(array $data=[]){
        $this->type='GET';
        $this->path='/order/user/deals';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *DELETE https://api.coinex.com/v1/order/pending
     * */
    public function deletePending(array $data=[]){
        $this->type='DELETE';
        $this->path='/order/pending';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *DELETE https://api.coinex.com/v1/order/pending/batch
     * */
    public function deletePendingBatch(array $data=[]){
        $this->type='DELETE';
        $this->path='/order/pending/batch';
        $this->data=$data;
        return $this->exec();
    }
}
