<?php

$memcache = new Memcache();
$memcache->connect('localhost', 11211);

$key = md5(1000000);
$value = $memcache->get($key);
var_dump($value);

$memcache->close();
