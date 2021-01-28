### 腾讯位置服务

##### 坐标转换 示例
```
use Namesfang\Tencent\Map\Log\Logger;
use Namesfang\Tencent\Map\Bundle\CoordOption;
use Namesfang\Tencent\Map\Bundle\Coord;

// +-----------------------------------------------------------
// | 日志记录
// | 自行封装需要实现 LoggerInterface 接口类
// +-----------------------------------------------------------
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
```

##### （逆）地址解析 示例
```
use Namesfang\Tencent\Map\Bundle\GeocoderOption;
use Namesfang\Tencent\Map\Log\Logger;
use Namesfang\Tencent\Map\Bundle\Geocoder;
// +-----------------------------------------------------------
// | 日志记录
// | 自行封装需要实现 LoggerInterface 接口类
// +-----------------------------------------------------------
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
```

##### IP定位
```
use Namesfang\Tencent\Map\Log\Logger;
use Namesfang\Tencent\Map\Bundle\LocationOption;
use Namesfang\Tencent\Map\Bundle\Location;
// +-----------------------------------------------------------
// | 日志记录
// | 自行封装需要实现 LoggerInterface 接口类
// +-----------------------------------------------------------
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
```