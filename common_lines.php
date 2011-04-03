#!/usr/bin/php -q

<?php

/**
 * This script finds common lines in given two files.
 * 
 * @author Yasar Senturk <yasarix@gmail.com>
 * @version 1.0
 */

if ($argc != 4)
{
	echo "Parameter error!\n";
	echo "Usage:\ncommon_lines.php <input_file_1> <input_file_2> <output_file>\n";
	die();
}

$sInputFile1 = $argv[1];
$sInputFile2 = $argv[2];
$sOutputFile = $argv[3];

$aList1 = array();
$aList2 = array();
$aCommon = array();

if (file_exists($sInputFile1))
{
	$fp = fopen($sInputFile1, 'r');

	while (!feof($fp))
	{
		$sReadLine = trim(fgets($fp, 4096));
		if ($sReadLine != '')
		{
			$aList1[] = $sReadLine;
		}
	}
}

fclose($fp);

if (file_exists($sInputFile2))
{
	$fp = fopen($sInputFile2, 'r');
	while (!feof($fp))
	{
		$sReadLine = trim(fgets($fp, 4096));
		if ($sReadLine != '')
		{
			$aList2[] = $sReadLine;
		}
	}
}

fclose($fp);

echo "$sInputFile1 lines: ".count($aList1)."\n";
echo "$sInputFile2 lines: ".count($aList2)."\n";

$aCommon = array_intersect($aList1, $aList2);

$fp = fopen($sOutputFile, 'w');
foreach ($aCommon as $sLine)
{
	fwrite($fp, $sLine."\n");
}

fclose($fp);

echo "Wrote ".count($aCommon)." lines.\n";

?>
