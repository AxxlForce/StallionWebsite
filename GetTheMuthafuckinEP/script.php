<?php

include 'fileIO.php';

/*
* check post
*/
if(isset($_POST['nw_update']))
{
	incrementCounter();

	redirect("thanks.html");

	die();
}

function incrementCounter() 
{
	$incrementedValue = readFromFile() + 1;
	writeToFile($incrementedValue);
}

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
}

?>
