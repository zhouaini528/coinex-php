<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex;

use GuzzleHttp\Exception\RequestException;
use Lin\Coinex\Exceptions\Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

class Request
{
    protected $key='';

    protected $secret='';

    protected $host='';

    protected $nonce='';

    protected $signature='';

    protected $authorization=false;

    protected $headers=[];

    protected $type='';

    protected $path='';

    protected $data=[];

    protected $options=[];


    protected $platform='';

    protected $version='';

    protected $async='';

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? '';

        $this->options=$data['options'] ?? [];

        $this->platform=$data['platform'] ?? [];
        $this->version=$data['version'] ?? [];

        $this->async=$data['async'] ?? '';
    }

    /**
     *
     * */
    protected function auth(){
        $this->nonce();

        $this->signature();

        $this->headers();

        $this->options();
    }

    /**
     *
     * */
    protected function nonce(){
        /*switch ($this->platform){
            case 'exchange':{
                break;
            }
            case 'perpetual':{
                break;
            }
        }
        */
        $this->nonce=time().'000';
    }

    /**
     *
     * */
    protected function signature(){
        switch ($this->platform){
            case 'exchange':{
                if($this->authorization===true){
                    $this->data=array_merge($this->data,[
                        'access_id'=>$this->key,
                        'tonce'=>$this->nonce,
                    ]);

                    $temp=implode('&',$this->sort($this->data)).'&secret_key='.$this->secret;
                    //echo $temp.PHP_EOL;
                    $this->signature = strtoupper(md5($temp));
                }
                break;
            }
            case 'perpetual':{
                if($this->authorization===true){
                    $this->data=array_merge($this->data,[
                        'timestamp'=>$this->nonce,
                    ]);

                    $temp=http_build_query($this->data, '', '&').'&secret_key='.$this->secret;
                    //echo $temp.PHP_EOL;
                    $this->signature =hash("sha256", $temp,false);
                }
                break;
            }
        }
    }

    /**
     *
     * */
    protected function headers(){
        $this->headers= [
            'Content-Type'=>'application/json',
        ];

        switch ($this->platform){
            case 'exchange':{
                if($this->authorization===true){
                    $this->headers['User-Agent']='Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36';
                    $this->headers['authorization']=$this->signature;
                }
                break;
            }
            case 'perpetual':{
                if($this->authorization===true){
                    $this->headers['AccessId']=$this->key;
                    $this->headers['Authorization']=$this->signature;

                    if($this->type=='POST') $this->headers['Content-Type']='application/x-www-form-urlencoded';
                }
                break;
            }
        }
    }

    /**
     *
     * */
    protected function options(){
        if(isset($this->options['headers'])) $this->headers=array_merge($this->headers,$this->options['headers']);

        $this->options['headers']=$this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;
    }

    /**
     *
    */
    protected function sort($param)
    {
        $u = [];
        $sort_rank = [];
        foreach ($param as $k => $v) {
            $u[] = $k . "=" . urlencode($v);
            $sort_rank[] = ord($k);
        }
        asort($u);

        return $u;
    }

    /**
     *@return mixed string|GuzzleHttp\Promise
     * */
    protected function send(){
        $client = new Client();

        $url=$this->host.$this->path;

        if($this->type!='POST') $url.= empty($this->data) ? '' : '?'.http_build_query($this->data);
        else {
            switch ($this->platform){
                case 'exchange':{
                    $this->options['body']=json_encode($this->data);
                    break;
                }
                case 'perpetual':{
                    $this->options['form_params']=$this->data;
                    break;
                }
            }
        }

        /*echo $this->type.PHP_EOL.$url.PHP_EOL;
        print_r($this->options);*/

        if(!empty($this->async)) {
            return [$this->async=>$client->requestAsync($this->type, $url, $this->options)];
        } else {
            $response = $client->request($this->type, $url, $this->options);
            return $response->getBody()->getContents();
        }
    }

    /**
     *
     * */
    public function exec(array $param=[]){
        try {
            if(isset($param['async']) && !empty($param['async'])){
                $async=[];
                foreach ($param['async'] as $k=>$v) {
                    if(is_object(current($v))) $async[key($v)]=current($v);
                    else throw new Exception('Is not an async type');
                }

                $temp=[];
                $unwarp=Promise\Utils::unwrap($async);
                foreach ($unwarp as $k=>$v) $temp[$k]=json_decode($v->getBody()->getContents(),true);

                return $temp;
            }

            $this->auth();

            if(!empty($this->async)) return $this->send();

            return json_decode($this->send(),true);
        }catch (RequestException $e){
            if(method_exists($e->getResponse(),'getBody')){
                $contents=$e->getResponse()->getBody()->getContents();

                $temp=json_decode($contents,true);
                if(!empty($temp)) {
                    $temp['_method']=$this->type;
                    $temp['_url']=$this->host.$this->path;
                }else{
                    $temp['_message']=$e->getMessage();
                }
            }else{
                $temp['_message']=$e->getMessage();
            }

            $temp['_httpcode']=$e->getCode();

            throw new Exception(json_encode($temp));
        }
    }
}
