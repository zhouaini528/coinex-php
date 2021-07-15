<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Exchange;

use Lin\Coinex\Request;

class Common extends Request
{
    /**
     *GET https://api.coinex.com/v1/common/currency/rate
     * */
    public function getCurrencyRate(array $data=[]){
        $this->type='GET';
        $this->path='/common/currency/rate';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/common/asset/config
     * */
    public function getAssetConfig(array $data=[]){
        $this->type='GET';
        $this->path='/common/asset/config';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET https://api.coinex.com/v1/common/maintain/info
     * */
    public function getMaintainInfo(array $data=[]){
        $this->type='GET';
        $this->path='/common/maintain/info';
        $this->data=$data;
        return $this->exec();
    }
}
