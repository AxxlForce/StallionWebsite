<?php

/*
* check post
*/
if(isset($_POST['nw_update']))
{
	incrementCounter();
}

function incrementCounter() 
{
	redirect("thanks.html");

	// $value = readValue();
	// writeValue(1);

	$incrementedValue = readFromFile() + 1;
	writeToFile($incrementedValue);

	die();
}

function readFromFile()
{
	$filename = "counter.dat";

	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize($filename));
	fclose($handle);
	return $contents;
}

function writeToFile($value)
{
	$filename = "counter.dat";

	if (is_writable($filename)) 
	{
		if (!$handle = fopen($filename, "w+")) 
		{
			exit;
		}
		if (!fwrite($handle, $value)) 
		{
			exit;
		}

		fclose($handle);
	} 
}

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
}

// function readValue() 
// {
// 	$connection = mysql_connect("db4free.net","","");

// 	// Check connection
// 	if ( $connection )
// 	{
// 		$db = mysql_select_db( "stalliondb" );

// 		if( $db )
// 		{
// 			$result = mysql_query("SELECT Counter FROM DownloadCounter");

// 			if ( $result ) 
// 			{
// 				$row = mysql_fetch_row($result);
// 				return $row[0];
// 			}
// 		}
// 	}
// 	mysql_close();
// }

// function writeValue($value) 
// {
// 	$connection = mysql_connect("db4free.net","","");

// 		// Check connection
// 	if ( $connection )
// 	{
// 		$db = mysql_select_db( "stalliondb" );

// 		if( $db )
// 		{
// 			$result = mysql_query(" UPDATE DownloadCounter SET Counter=" . $value);
// 		}
// 	}
// 	mysql_close();
// }

?>
