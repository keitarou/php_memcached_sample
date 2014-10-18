<?php

$memcached = new Memcached();
$memcached->addServer('localhost', 11211);


$file = fopen('./sample.csv', 'r');
if($file){
    $items = [];
    while($line = fgets($file)){
        $line = str_replace(array("\r\n","\n","\r"), '', $line);
        $key   = preg_split('/,/', $line)[0];
        $value = preg_split('/,/', $line)[1];
        $items[$key] = $value;

        if(count($items) > 1000){
            $memcached->setMulti($items, 0);
            $items = [];
        }
    }
    if(count($items) > 0){
        $memcached->setMulti($items, 0);
        $items = [];
    }
}


$memcache->close();
