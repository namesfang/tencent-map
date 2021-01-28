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
 * （逆）地址解析
 */
class Geocoder extends Bundle
{
    /**
     * 地址解析（地址转坐标）
     * @param boolean $using_sig 使用签名方式校验
     * @return \Namesfang\Tencent\Map\Response
     */
    public function request($using_sig=false)
    {
        $path = '/ws/geocoder/v1';
        
        if($using_sig) {
            $this->option->setSig($path);
        }
        
        $data = $this->option->getAll();
        
        //$this->logger->print($data, true);
        
        $request = new Request($this->logger);
        
        $request->url(self::BASE_URL);
        $request->path($path);
        $request->query($data);
        
        return $request->get();
    }
}