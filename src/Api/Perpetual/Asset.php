<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex\Api\Perpetual;

use Lin\Coinex\Request;

class Asset extends Request
{
    //Use sha256 algorithm signature by default
    protected $authorization=true;

    /**
     *GET https://api.coinex.com/perpetual/v1/asset/query
     * */
    public function getQuery(array $data=[]){
        $this->type='GET';
        $this->path='/asset/query';
        $this->data=$data;
        return $this->exec();
    }
}
