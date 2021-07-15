<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\SpotV3;

use Lin\Coinex\Request;

class Privates extends Request
{
    /**
     *HTTP GET /api/v3/spot/account/list
     * */
    public function getAccountList(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/account/list';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/account/one?asset=USDT
     * */
    public function getAccountOne(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/account/one';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP POST /api/v3/spot/order
     * */
    public function postOrder(array $data=[]){
        $this->type='POST';
        $this->path='/api/v3/spot/order';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP POST /api/v3/spot/batch_order
     * */
    public function postBatchOrder(array $data=[]){
        $this->type='POST';
        $this->path='/api/v3/spot/batch_order';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/open_orders?instrument_id=BTC%2FUSDT&latestOrderId=
     * */
    public function getOpenOrders(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/open_orders';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP GET /api/v3/spot/closed_orders?instrument_id=BTC%2FUSDT&latestOrderId=
     * */
    public function getClosedOrders(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/closed_orders';
        $this->data=$data;
        return $this->exec();
    }



    /**
     *HTTP GET /api/v3/spot/order_info?order_id=2120224216451338240
     * */
    public function getOrderInfo(array $data=[]){
        $this->type='GET';
        $this->path='/api/v3/spot/order_info';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP POST /api/v3/spot/cancel_order
     * */
    public function postCancelOrder(array $data=[]){
        $this->type='POST';
        $this->path='/api/v3/spot/cancel_order';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *HTTP POST /api/v3/spot/batch_cancel_order
     * */
    public function postBatchCancelOrder(array $data=[]){
        $this->type='POST';
        $this->path='/api/v3/spot/batch_cancel_order';
        $this->data=$data;
        return $this->exec();
    }


    /**
     *
     * */
    /*public function post(array $data=[]){
        $this->type='POST';
        $this->path='';
        $this->data=$data;
        return $this->exec();
    }*/
}
