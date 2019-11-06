<?php

require_once ('db.php');

parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY),$arr);
$a = new db();
if (true==$arr['timestamp'])
{
    $t = date("Y-m-d H:i:s");

    $a->insertTimestamp($t);
   http_response_code();
    header('Status: 200 OK');
}
else{
    var_dump($a->getLastTime());
}