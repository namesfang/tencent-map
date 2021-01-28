<?php
// +-----------------------------------------------------------
// | 腾讯位置服务
// +-----------------------------------------------------------
// | 人个主页 http://cli.life
// | 堪笑作品 jixiang_f@163.com
// +-----------------------------------------------------------
namespace Namesfang\Tencent\Map;

use Namesfang\Tencent\Map\Bundle\Option;
use Namesfang\Tencent\Map\Log\LoggerInterface;

/**
 * Bundle基类
 */
class Bundle
{
    // 参数
    public $option;
    // 日志
    public $logger;
    
    const BASE_URL = 'https://apis.map.qq.com';
    
    public function __construct(Option $option, LoggerInterface $logger)
    {
        // option
        $this->option = $option;
        // logger
        $this->logger = $logger;
    }
}