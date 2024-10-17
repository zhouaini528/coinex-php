<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Perpetual;

use Lin\Coinex\Request;

class Position extends Request
{
    //Use sha256 algorithm signature by default
    protected $authorization=true;

    /**
     *GET https://api.coinex.com/perpetual/v1/position/pending
     * */
    public function getPending(array $data=[]){
        $this->type='GET';
        $this->path='/position/pending';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/perpetual/v1/position/funding
     * */
    public function getFunding(array $data=[]){
        $this->type='GET';
        $this->path='/position/funding';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/position/adjust_margin
     * */
    public function postAdjustMargin(array $data=[]){
        $this->type='POST';
        $this->path='/position/adjust_margin';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/position/take_profit
     * */
    public function postTakeProfit(array $data=[]){
        $this->type='POST';
        $this->path='/position/take_profit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/perpetual/v1/position/stop_loss
     * */
    public function postStopLoss(array $data=[]){
        $this->type='POST';
        $this->path='/position/stop_loss';
        $this->data=$data;
        return $this->exec();
    }
}
