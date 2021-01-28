<?php
use Namesfang\Tencent\Map\Bundle\GeocoderOption;
use Namesfang\Tencent\Map\Log\Logger;
use Namesfang\Tencent\Map\Bundle\Geocoder;

// +-----------------------------------------------------------
// | （逆）地址解析
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
$option = new GeocoderOption();
$option->setKey('key');
$option->setSecret('secret');
$option->setAddress("安徽省合肥市瑶海区");


$geo = new Geocoder($option, $logger);

$ret = $geo->request(true);

//$logger->print($ret->original, true);

$logger->print($ret->result);

$logger->print($ret->status);