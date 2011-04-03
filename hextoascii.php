#!/usr/bin/php -q

<?

/**
 * This script converts given given hex string to ASCII string
 * 
 * Copyright (C) 2011 Yasar Senturk <yasarix@gmail.com>
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
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
