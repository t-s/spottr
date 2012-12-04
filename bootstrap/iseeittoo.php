<?php

	function getIp()
	{
    	if (!empty($_SERVER['HTTP_CLIENT_IP']))
    	{
    		$ip=$_SERVER['HTTP_CLIENT_IP'];
    	}
    	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    	{
        	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    	}
    	else
    	{
        	$ip=$_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
	}

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


	if(isset($_POST['id']))
    {
		$ip = getIP();	

        $id = $_POST['id'];

		$query = "select * from iseeittoos where ip='".$ip."' AND pictureID=1 AND rowID=".$id;

        $result = mysql_query($query) or die (mysql_error());
		
		if(mysql_num_rows($result)==0)
		{

			$query = "insert into iseeittoos (ip, pictureID, rowID) VALUES ('".$ip."', 1, ".$id.");";


			$result = mysql_query($query) or die (mysql_error());

        	$query = "update usee set metoo = metoo+1 where id=".$id;

        	$result = mysql_query($query) or die (mysql_error());
		}
    }

	$query = "select metoo from usee where id = ".$id;
	$result = mysql_query($query) or die (mysql_error());

	$row = mysql_fetch_array($result);
	echo $row['metoo'];
?>
