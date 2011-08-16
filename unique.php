#!/usr/bin/php -q

<?php

/**
 * This script removes duplicated lines.
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

echo "Wrote ".count($aUniqueList)." line(s).\n";

?>
