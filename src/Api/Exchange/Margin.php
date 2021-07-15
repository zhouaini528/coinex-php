<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Exchange;

use Lin\Coinex\Request;

class Margin extends Request
{
    //Use 32-bit MD5 Algorithm Signature
    protected $authorization=true;

    /**
     *GET https://api.coinex.com/v1/margin/account
     * */
    public function getAccount(array $data=[]){
        $this->type='GET';
        $this->path='/margin/account';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/margin/market
     * */
    public function getMarket(array $data=[]){
        $this->type='GET';
        $this->path='/margin/market';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/margin/config
     * */
    public function getConfig(array $data=[]){
        $this->type='GET';
        $this->path='/margin/config';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/margin/loan/history
     * */
    public function getLoanHistory(array $data=[]){
        $this->type='GET';
        $this->path='/margin/loan/history';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/margin/loan
     * */
    public function postLoan(array $data=[]){
        $this->type='POST';
        $this->path='/margin/loan';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/margin/flat
     * */
    public function postFlat(array $data=[]){
        $this->type='POST';
        $this->path='/margin/flat';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/margin/transfer
     * */
    public function postTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/margin/transfer';
        $this->data=$data;
        return $this->exec();
    }

}
