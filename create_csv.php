<?php

$fp = fopen('./sample.csv', 'w');

for($i=1; $i<=1000000; $i++){
// for($i=1; $i<=1000; $i++){
    $line = md5($i). ",". md5($i.'hoge'). "\n";
    fputs($fp, $line);
}

fclose($fp);
