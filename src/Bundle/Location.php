<?php
// +-----------------------------------------------------------
// | 腾讯位置服务
// +-----------------------------------------------------------
// | 人个主页 http://cli.life
// | 堪笑作品 jixiang_f@163.com
// +-----------------------------------------------------------
namespace Namesfang\Tencent\Map\Bundle;

use Namesfang\Tencent\Map\Bundle;
use Namesfang\Tencent\Map\Request;

/**
 * IP定位
 * 通过终端设备IP地址获取其当前所在地理位置
 * 精确到市级，常用于显示当地城市天气预报、初始化用户城市等非精确定位场景。
 */
class Location extends Bundle
{
    /**
     * IP定位
     * @param boolean $using_sig 使用签名方式校验
     * @return \Namesfang\Tencent\Map\Response
     */
    public function request($using_sig=false)
    {
        $path = '/ws/location/v1/ip';
        
        if($using_sig) {
            $this->option->setSig($path);
        }
        
        $data = $this->option->getAll();
        
        $request = new Request($this->logger);
        
        //$this->logger->print($data, true);
        
        $request->url(self::BASE_URL);
        $request->path($path);
        $request->query($data);
        
        return $request->get();
    }
}