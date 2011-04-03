#!/usr/bin/php -q

<?php

/**
 * This script finds differences between two files and writes into the output
 * file. Note that this script only finds the lines that does not exist in
 * second file.
 * 
 * @author Yasar Senturk <yasarix@gmail.com>
 * @version 1.0
 */

if ($argc != 4) {
	echo "Parameter Error!\n";
	echo "Usage:\n";
	echo "total_diff.php <input file 1> <input file 2> <output file>\n";
	exit;
}

function load_file($sFileName)
{
	$aList = array();
	
	if (file_exists($sFileName))
	{
		$fp = fopen($sFileName, 'r');
		while (!feof($fp))
		{
			$sLine = trim(fgets($fp, 4096));
			if ($sLine != '') 
			{
				$aList[] = $sLine;
			}
		}
		
		fclose($fp);
	}
	else
	{
		die("File does not exist: $sFileName\n");
	}
	
	return $aList;
}

$sInputFile1 = $argv[1];
$sInputFile2 = $argv[2];
$sOutputFile =  $argv[3];

$aList1 = load_file($sInputFile1);
$aList2 = load_file($sInputFile2);

echo "$sInputFile1: ".count($aList1)." lines\n";
echo "$sInputFile2: ".count($aList2)." lines\n";

$aDiff = array_diff($aList1, $aList2);

$fp = fopen($sOutputFile, 'w');
foreach ($aDiff as $sDifference)
{
	fwrite($fp, $sDifference."\n");
}

fclose($fp);

echo "Wrote ".count($aDiff)." line(s).\n";

?>
