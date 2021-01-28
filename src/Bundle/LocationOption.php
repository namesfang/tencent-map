<?php
// +-----------------------------------------------------------
// | 腾讯位置服务
// +-----------------------------------------------------------
// | 人个主页 http://cli.life
// | 堪笑作品 jixiang_f@163.com
// +-----------------------------------------------------------
namespace Namesfang\Tencent\Map\Bundle;

/**
 * IP定位
 * 参数
 */
class LocationOption extends Option
{
    /**
     * IP地址 非必填
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\LocationOption
     */
    public function setIp($value)
    {
        $this->ip = $value;
        return $this;
    }
}