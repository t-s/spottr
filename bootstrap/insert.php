<?php

	register_shutdown_function('handleFatalPhpError');
	function handleFatalPhpError()
	{
		$last_error = error_get_last();
		print_r($last_error);
	}


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "spottr";
	$link = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
	mysql_select_db($dbname) or die (mysql_error());	

	if(isset($_POST['imgname']))
	{
		$imgname = $_POST['imgname'];
		$label = $_POST['label'];
		$data = $_POST['data'];
		$data = urlencode($data);
		$query = "insert into usee (imgid, label, data, metoo) VALUES ('$imgname','$label','$data',0)";

		mysql_query($query) or die (mysql_error());
	}

?>
