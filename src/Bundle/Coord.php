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
 * 坐标转换
 * 实现从其它地图供应商坐标系或标准GPS坐标系
 * 批量转换到腾讯地图坐标系
 */
class Coord extends Bundle
{
    /**
     * 逆地址解析（坐标位置描述）
     * @param boolean $using_sig 使用签名方式校验
     */
    public function request($using_sig=false)
    {
        $path = '/ws/coord/v1/translate';
        
        
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