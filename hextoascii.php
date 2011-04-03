#!/usr/bin/php -q

<?

/**
 * This script converts given given hex string to ASCII string
 * 
 * @author Yasar Senturk <yasarix@gmail.com>
 * @version 1.0
 */

if ($argc != 2) {
	echo "Parameter error!\n";
	echo "Usage:\nhextoascii.php <hexstring>\n";
	die();
}

for ($i = 0; $i < strlen($argv[1]); $i = $i + 2) {
	echo chr(hexdec(substr($argv[1], $i, 2)));
}

echo "\n";

?>
