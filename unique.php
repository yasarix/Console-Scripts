#!/usr/bin/php -q

<?php

/**
 * This script removes duplicated lines.
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

if ($argc != 3)
{
	echo "Parameter Error!\n";
	echo "Usage:\n";
	echo "unique.php <input file> <output file>\n";
	exit;
}

$sInputFile = $argv[1];
$sOutputFile = $argv[2];

$aInputList = array();
$aUniqueList = array();

if (file_exists($sInputFile))
{
	$fp = fopen($sInputFile, 'r');

	while (!feof($fp))
	{
		$sReadLine = trim(fgets($fp, 4096));

		if ($sReadLine != '')
		{
			$aInputList[] = $sReadLine;
		}
	}
}

fclose($fp);

echo "Input file: ".count($aInputList)." line(s).\n";

$aUniqueList = array_unique($aInputList);

$fp = fopen($sOutputFile, 'w');
foreach ($aUniqueList as $sLine)
{
	fwrite($fp, $sLine."\n");
}

fclose($fp);

echo "Write ".count($aUniqueList)." line(s).\n";

?>
