<?php
define('PATHROOT', '../');
// gets:
// ip, port
//
$port = preg_replace( "/[^0-9]/", "", $_GET['port'] );
if (!isset($_GET['port']))
{echo "No port";exit;}

function test_serv($port)
{
	if ($_GET['ip']=='')
		$server=preg_replace( "/[^a-zA-Z0-9.]/", "", $_GET['ip'] );
	else
		$server='127.0.0.1';
	$s = @fsockopen($server, $port, $ERROR_NO, $ERROR_STR,(float)0.5);
	if($s){@fclose($s);return true;} else return false;
}
	
if (test_serv($port))
	echo '<span class="colorgood">Online</span>';
else
	echo '<span class="colorbad">Offline</span>';