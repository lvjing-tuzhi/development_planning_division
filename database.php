<?php 
$host = '127.0.0.1';
$user = 'root';
$password = 'root';
$dbname = 'develop_department';
$db = new MySQLi($host,$user,$password,$dbname);
$db->query('set names UTF8');
if($db->connect_errno <> 0){
	echo "数据库连接失败";
	die();
	}

?>