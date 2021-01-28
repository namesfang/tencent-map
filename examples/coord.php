<?php
use Namesfang\Tencent\Map\Log\Logger;
use Namesfang\Tencent\Map\Bundle\CoordOption;
use Namesfang\Tencent\Map\Bundle\Coord;

// +-----------------------------------------------------------
// | 坐标转换
// +-----------------------------------------------------------

define('ROOT_PATH', dirname(__DIR__));
define('LOG_PATH',  sprintf('%s/logs', ROOT_PATH));

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    $className = str_replace('Namesfang/Tencent/Map/', '', $className);
    
    require_once sprintf('%s/src/%s.php', ROOT_PATH, $className);
});

$logger = new Logger(LOG_PATH, true);

// 实例化传入参数
$option = new CoordOption();
$option->setKey('key');
$option->setSecret('secret');
$option->setLocation('39.12', '116.83');
$option->setLocation('30.21', '115.43');
// 或者使用
//$option->setLocations('39.12,116.83;30.21,115.43');
$option->setType($option::TYPE_BAIDU);

$location = new Coord($option, $logger);

$ret = $location->request(true);

//$logger->print($ret->original, true);

$logger->print($ret->result);

//$logger->print($ret->status);