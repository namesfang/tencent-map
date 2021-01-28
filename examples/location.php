<?php
use Namesfang\Tencent\Map\Log\Logger;
use Namesfang\Tencent\Map\Bundle\LocationOption;
use Namesfang\Tencent\Map\Bundle\Location;

// +-----------------------------------------------------------
// | IP定位
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
$option = new LocationOption();
$option->setKey('key');
$option->setSecret('secret');
// 如不传默认为当前请求地址
//$option->setIp('139.73.33.33');

$location = new Location($option, $logger);

$ret = $location->request(true);

//$logger->print($ret->original, true);

$logger->print($ret->result);

//$logger->print($ret->status);