<?php
// +-----------------------------------------------------------
// | 腾讯位置服务
// +-----------------------------------------------------------
// | 人个主页 http://cli.life
// | 堪笑作品 jixiang_f@163.com
// +-----------------------------------------------------------
namespace Namesfang\Tencent\Map\Bundle;

use Namesfang\Tencent\Map\Bundle;

/**
 * （逆）地址解析参数
 */
class GeocoderOption extends Option
{
    protected $allowOptions = [
        'address',
        'region',
        'location',
        'get_poi',
        'poi_options',
        'key',
        'output',
        'callback'
    ];
    
    /**
     * 地址 必填
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\GeocoderOption
     */
    public function setAddress($value)
    {
        $this->address = $value;
        return $this;
    }
    
    /**
     * 指定地址所属城市 非必填项
     * 地址转坐标可用
     * @param string $value
     * @return \Namesfang\Tencent\Map\Bundle\GeocoderOption
     */
    public function setRegion($value)
    {
        $this->region = $value;
        return $this;
    }
    
    /**
     * 位置坐标 必填
     * @param string $lat 纬度
     * @param string $lng 经度
     * @return \Namesfang\Tencent\Map\Bundle\GeocoderOption
     */
    public function setLocation($lat, $lng)
    {
        $this->location = "{$lat},{$lng}";
        return $this;
    }
    
    /**
     * 是否返回周边POI列表 非必填
     * 坐标所在位置的文字描述
     * @param number $value 1 返回 0 不返回(默认)
     * @return \Namesfang\Tencent\Map\Bundle\GeocoderOption
     */
    public function setGetPoi($value)
    {
        $this->get_poi = $value;
        return $this;
    }
    
    /**
     * 参数 非必填
     * 坐标所在位置的文字描述
     * @param string $address_format 取值范围 short
     * @param string $redius 取值范围 1~5000
     * @param number $policy 取值范围 1-5
     * @param string $category 分类词 多个用逗号分隔
     * @param number $page_index 页码 1
     * @param number $page_size 每页条数，取值范围 1-20
     * @return \Namesfang\Tencent\Map\Bundle\GeocoderOption
     */
    public function setPoiOptions($address_format=null, $category=null, $redius=null, $policy=1, $page_index=1, $page_size=20)
    {
        $default = [
            'address_format'=> null,
            'radius'=> null,
            'page_size'=> 20,
            'page_index'=> 1,
            'policy'=> 1,
            'category'=> null,
        ];
        
        $tmp = [];
        foreach ($default as $name => $_) {
            if(is_null(${$name})) {
                continue;
            }
            $tmp[] = "{$name}={${$name}}";
        }
        
        $this->poi_options = implode(';', $tmp);
        return $this;
    }
}