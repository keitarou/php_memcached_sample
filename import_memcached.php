<?php

$memcache = new Memcache();
$memcache->connect('localhost', 11211);

$file = fopen('./sample.csv', 'r');
if($file){
    while($line = fgets($file)){
        $line = str_replace(array("\r\n","\n","\r"), '', $line);
        $key   = preg_split('/,/', $line)[0];
        $value = preg_split('/,/', $line)[1];
        if(!($memcache->set($key, $value, 0, 0)))
        {
            echo 'errorrrr';
        }
    }
}


$memcache->close();
