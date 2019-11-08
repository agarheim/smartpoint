<?php

require_once ('db.php');

parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY),$arr);
$a = new db();
if (true==$arr['timestamp'])
{
    $t = date("Y-m-d H:i:s");
    $key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));

    http_response_code();
    header('Status: 200 OK');

   $a->insertTimestamp($t, $key);
    echo json_encode(array('apikey' => $key));
}
else{
    var_dump($a->getLastTime());
}