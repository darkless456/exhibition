<?php
/*
 * @Author: darkless
 * @Date:   2016-02-26 16:19:25
 * @Last Modified by:   Kevin
 * @Last Modified time: 2016-04-09 10:56:52
*/
// SAE MySQL
 // $hostname = SAE_MYSQL_HOST_M. ':'. SAE_MYSQL_PORT;
 // $dbuser = SAE_MYSQL_USER;
 // $dbpass = SAE_MYSQL_PASS;
 // $dbname = SAE_MYSQL_DB;

 // Weixian MySQL
 $hostname = 'localhost'. ':'. '3306';
 $dbuser = 'iznbbfpp_cook';
 $dbpass = 'yTX54+l5';
 $dbname = 'iznbbfpp_cookdata';

// Local MySQL
// $hostname = 'localhost';
// $dbuser = 'root';
// $dbpass = '';
// $dbname = 'cookdb';

$dsn = 'mysql:hostname='.$hostname.';dbname='.$dbname;
$link = new PDO($dsn, $dbuser, $dbpass);

$link->query("set charactor set 'utf8';");
$link->query("set names 'utf8';");
date_default_timezone_set('PRC');

?>
