<?php
$hostname=SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
$dbuser= SAE_MYSQL_USER;
$dbpass=SAE_MYSQL_PASS;
$dbname= SAE_MYSQL_DB;
$timezone="Asia/Shanghai";

$link=mysql_connect($hostname,$dbuser,$dbpass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
mysql_select_db($dbname,$link) or die ('Can\'t use dbname : ' . mysql_error());
mysql_query("SET names UTF8");

?>
