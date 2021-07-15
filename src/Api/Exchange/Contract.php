<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Exchange;

use Lin\Coinex\Request;

class Contract extends Request
{
    //Use 32-bit MD5 Algorithm Signature
    protected $authorization=true;

    /**
     *POST https://api.coinex.com/v1/contract/balance/transfer
     * */
    public function postBalanceTransfer(array $data=[]){
        $this->type='POST';
        $this->path='/contract/balance/transfer';
        $this->data=$data;
        return $this->exec();
    }
}
