<?php

$config=dirname(dirname(dirname(__FILE__))).'/application/config/core.php';

require_once($config);

$hai = new Eastjavabaker\Mlm\Binary();


$hai->set_root_downline(1);

$hai->set_downline($hai->get_root_downline());
echo "<pre>";
print_r($hai->get_downline());
echo "</pre>";

echo $_GET['url'];

?>