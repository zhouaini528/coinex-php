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

    protected $headers=[];

    protected $type='';

    protected $path='';

    protected $data=[];

    protected $options=[];

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? '';

        $this->options=$data['options'] ?? [];
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
        $this->nonce = date("Y-m-d\TH:i:s"). substr((string)microtime(), 1, 4) . 'Z';
    }

    /**
     *
     * */
    protected function signature(){
        $path=$this->path;
        if (strtoupper($this->type) == 'GET') {
            $path .= $this->data ? '?'.http_build_query($this->data) : '';
        }else{
            $body = $this->data ? json_encode($this->data) : '';
        }

        $message = $this->nonce.strtoupper($this->type).$path.($body ?? '');
        $this->signature= hash_hmac('sha256', $message, $this->secret, false);
    }

    /**
     *
     * */
    protected function headers(){
        $this->headers= [
            'Content-Type'=>'application/json',
            "ACCESS-KEY"=>$this->key,
            "ACCESS-SIGN"=>$this->signature,
            "ACCESS-TIMESTAMP"=>$this->nonce,
        ];
    }

    /**
     *
     * */
    protected function options(){
        if(isset($this->options['headers'])) $this->headers=array_merge($this->headers,$this->options['headers']);

        $this->options['headers']=$this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;

        if(isset($this->options['proxy']) && $this->options['proxy']===true) {
            $this->options['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
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
