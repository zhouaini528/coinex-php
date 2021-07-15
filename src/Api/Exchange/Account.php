<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Exchange;

use Lin\Coinex\Request;

class Account extends Request
{
    //Use 32-bit MD5 Algorithm Signature
    protected $authorization=true;

    /**
     *GET https://api.coinex.com/v1/balance/info
     * */
    public function getBalanceInfo(array $data=[]){
        $this->type='GET';
        $this->path='/balance/info';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/balance/coin/withdraw
     * */
    public function getBalanceCoinWithdraw(array $data=[]){
        $this->type='GET';
        $this->path='/balance/coin/withdraw';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/balance/coin/withdraw
     * */
    public function postBalanceCoinWithdraw(array $data=[]){
        $this->type='POST';
        $this->path='/balance/coin/withdraw';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *DELETE https://api.coinex.com/v1/balance/coin/withdraw
     * */
    public function deleteBalanceCoinWithdraw(array $data=[]){
        $this->type='DELETE';
        $this->path='/balance/coin/withdraw';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/balance/coin/deposit
     * */
    public function getBalanceCoinDeposit(array $data=[]){
        $this->type='GET';
        $this->path='/balance/coin/deposit';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/sub_account/transfer
     * */
    public function postSubAccountTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/sub_account/transfer';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST https://api.coinex.com/v1/margin/transfer
     * */
    public function postMarginTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/margin/transfer';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /balance/deposit/address/<string:coin_type>
     * */
    public function getBalanceDepositAddress(array $data=[]){
        $this->type='GET';
        $this->path='/balance/deposit/address/'.$data['coin_type'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *PUT /balance/deposit/address/<string:coin_type>
     * */
    public function putBalanceDepositAddress(array $data=[]){
        $this->type='PUT';
        $this->path='/balance/deposit/address/'.$data['coin_type'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/sub_account/balance
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/sub_account/transfer/history
     * */
    public function getSubAccountTransferHistory(array $data=[]){
        $this->type='GET';
        $this->path='/sub_account/transfer/history';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/credit/info
     * */
    public function getCreditInfo(array $data=[]){
        $this->type='GET';
        $this->path='/credit/info';
        $this->data=$data;
        return $this->exec();
    }
}
