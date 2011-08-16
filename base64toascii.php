#!/usr/bin/php -q

<?php
if ($argc != 2) {
	echo "Parameter error!\n";
	echo "Usage:\nbase64toascii.php <base64string>\n";
	die();
}

echo base64_decode($argv[1])."\n";

?>
