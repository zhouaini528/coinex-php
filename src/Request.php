<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinex;

use GuzzleHttp\Exception\RequestException;
use Lin\Coinex\Exceptions\Exception;

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

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? '';

        $this->options=$data['options'] ?? [];

        $this->platform=$data['platform'] ?? [];
        $this->version=$data['version'] ?? [];
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
        //$this->nonce = date("Y-m-d\TH:i:s"). substr((string)microtime(), 1, 4) . 'Z';
        $this->nonce=time().'000';
    }

    /**
     *
     * */
    protected function signature(){
        /*$path=$this->path;
        if (strtoupper($this->type) == 'GET') {
            $path .= $this->data ? '?'.http_build_query($this->data) : '';
        }else{
            $body = $this->data ? json_encode($this->data) : '';
        }

        $message = $this->nonce.strtoupper($this->type).$path.($body ?? '');
        $this->signature= hash_hmac('sha256', $message, $this->secret, false);
        */
        switch ($this->platform){
            case 'exchange':{
                if($this->authorization===true){
                    $temp=array_merge($this->data,[
                        'access_id'=>$this->key,
                        'tonce'=>$this->nonce,
                    ]);

                    $temp=implode('&',$this->sort($temp)).'&secret_key='.$this->secret;
                    //echo $temp.PHP_EOL;
                    $this->signature = strtoupper(md5($temp));
                }
                break;
            }
            case 'perpetual':{
                break;
            }
        }
    }

    /**
     *
     * */
    protected function headers(){
        switch ($this->platform){
            case 'exchange':{
                $this->headers= [
                    'Content-Type'=>'application/json',
                ];

                if($this->authorization===true){
                    $this->headers['User-Agent']='Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36';
                    $this->headers['authorization']=$this->signature;
                }

                break;
            }
            case 'perpetual':{
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
     *
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();

        $url=$this->host.$this->path;

        if($this->type=='GET') $url.= empty($this->data) ? '' : '?'.http_build_query($this->data);
        else $this->options['body']=json_encode($this->data);

        /*echo $url.PHP_EOL;
        print_r($this->options);
        die;*/
        $response = $client->request($this->type, $url, $this->options);

        return $response->getBody()->getContents();
    }

    /*
     *
     * */
    protected function exec(){
        $this->auth();

        try {
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
