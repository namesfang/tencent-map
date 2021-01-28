<?php
// +-----------------------------------------------------------
// | 腾讯位置服务
// +-----------------------------------------------------------
// | 人个主页 http://cli.life
// | 堪笑作品 jixiang_f@163.com
// +-----------------------------------------------------------
namespace Namesfang\Tencent\Map\Bundle;

/**
 * 公共请求参数
 */
class Option
{
    /**
     * 所有接口参数
     * @var array
     */
    protected $option = [];
    
    /**
     * 接口密钥
     * @var string
     */
    protected $secret;
    
    /**
     * 允许批量设置的参数
     * @var array
     */
    protected $allowOptions = [];
    
    const OUTPUT_JSON = 'json';
    const OUTPUT_JSONP = 'jsonp';
    
    /**
     * 必须在此设置 key
     * @param string $access_key_secret
     */
    public function __construct(array $option=[])
    {
        foreach ($option as $name => $value) {
            if(isset($this->allowOptions[ $name ])) {
                $this->option[ $name ] = $value;
            }
        }
    }
    
    /**
     * 设置接口参数
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        $this->option[ $name ] = $value;
    }
    
    /**
     * 获得接口参数
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if(isset($this->option[ $name ])) {
            return $this->option[ $name ];
        }
    }
    
    /**
     * 获得所有参数
     * @return string
     */
    public function getAll()
    {
        return $this->option;
    }
    
    /**
     * 开发密钥 必填
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\Option
     */
    public function setKey($value)
    {
        $this->key = $value;
        return $this;
    }
    
    /**
     * 开发密钥 签名时必填
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\Option
     */
    public function setSecret($value)
    {
        $this->secret = $value;
        return $this;
    }
    
    /**
     * 返回格式：支持JSON/JSONP，默认JSON
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\Option
     */
    public function setOutput($value=self::OUTPUT_JSON)
    {
        $this->output = $value;
        return $this;
    }
    
    /**
     * JSONP方式回调函数
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\Option
     */
    public function setCallback($value)
    {
        $this->output = self::OUTPUT_JSONP;
        $this->callback = $value;
        return $this;
    }
    
    /**
     * 签名
     * @param string $uri
     * @return \Namesfang\Tencent\Map\Bundle\Option
     */
    public function setSig($uri)
    {
        $this->sig = $this->buildSig($uri, $this->getAll());
        return $this;
    }
    
    /**
     * 生成签名
     * @param string $uri
     * @return string
     */
    protected function buildSig($uri, $option)
    {
        ksort($option);
        
        $pieces = [];
        foreach ($option as $key => $val)
        {
            $pieces[] = "{$key}={$val}";
        }
        
        $str = sprintf('%s?%s', rtrim($uri, '/'), implode('&', $pieces));
        
        /*
         echo '<pre>';
         print_r("{$str}{$this->secret}");
         die;
         //*/
        
        return md5("{$str}{$this->secret}");
    }
}