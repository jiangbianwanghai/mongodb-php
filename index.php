<?php
require 'vendor/autoload.php'; // include Composer's autoloader

//使用uri链接MongoDB资源
$uri = "mongodb://mongoadmin:mongoadmin@192.168.8.234:27017"; //可以根据你的实际情况配置uri
$client = new MongoDB\Client($uri);
$collection = $client->demo->beers;

//===================
//插入文档
$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

echo "Inserted with Object ID '{$result->getInsertedId()}'\n";

//===================
//查找并遍历集合
$result = $collection->find( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

foreach ($result as $entry) {
    echo $entry['_id'], ': ', $entry['name'], "\n";
}
