<?php
// +-----------------------------------------------------------
// | 腾讯位置服务
// +-----------------------------------------------------------
// | 人个主页 http://cli.life
// | 堪笑作品 jixiang_f@163.com
// +-----------------------------------------------------------
namespace Namesfang\Tencent\Map\Bundle;

/**
 * 坐标转换
 * 参数
 */
class CoordOption extends Option
{
    const TYPE_GPS = 1;
    const TYPE_SOGOU = 2;
    const TYPE_BAIDU = 3;
    const TYPE_MAPBAR = 4;
    const TYPE_DEFAULT = 5;
    const TYPE_SOGOU_MERCATOR = 6;
    
    protected $allowOptions = [
        'locations',
        'type',
        'key',
        'output',
        'callback',
    ];
    
    /**
     * 预转换的坐标
     * @param string $lat 纬度
     * @param string $lng 经度
     * @return \Namesfang\Tencent\Map\Bundle\CoordOption
     */
    public function setLocation($lat, $lng)
    {
        if($this->locations) {
            $this->locations .= ";{$lat},{$lng}";
        } else {
            $this->locations = "{$lat},{$lng}";
        }
        return $this;
    }
    
    /**
     * 预转换的坐标，支持批量转换
     * @param mixed $locations
     * @return \Namesfang\Tencent\Map\Bundle\CoordOption
     */
    public function setLocations($locations)
    {
        if (is_array($locations)) {
            $pieces = [];
            foreach ($locations as $item) {
                if(is_array($item)) {
                    $pieces[] = "{$item[0]},{$item[1]}";
                }
            }
            $locations = implode(';', $pieces);
        }
        $this->locations = $locations;
        return $this;
    }
    
    /**
     * 设置坐标类型
     * @param number $value
     *  1 GPS坐标
     *  2 sogou经纬度
     *  3 baidu经纬度
     *  4 mapbar经纬度
     *  5 腾讯、google、高德坐标[默认]
     *  6 sogou墨卡托
     * @return \Namesfang\Tencent\Map\Bundle\CoordOption
     */
    public function setType($value=self::TYPE_DEFAULT)
    {
        $this->type = $value;
        return $this;
    }
}