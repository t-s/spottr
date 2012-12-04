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

	$connect = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());	mysql_select_db($dbname) or die (mysql_error());

	if(isset($_POST['imgid']))
	{
		$imgid = $_POST['imgid'];
		$query = "select id,label,data,metoo from usee where imgid='$imgid'";
		
		$result = mysql_query($query);

	}

	echo "<table id='tbl' align='center' class='cheese' width='450px' cellpadding='4' cellspacing='0' style='border-spacing: 0pt 10pt;'>";

	if($result != NULL)
	{

	$rc = 0;

	while($row = mysql_fetch_array($result))
	{
		$rn = $rc%2;
		echo "<tr>";
		echo "<td class='tde tde".$rn."' style='cursor:pointer;font-size:120%;' align='left' id='".$row['id']."' onmouseout='clearme();'>".ucfirst($row['label'])."</td>";
		echo "<td class='tde".$rn."' id='".$row['id']."data' style='display:none'>".$row['data']."</td>";
		echo "<td class='metoo tde".$rn."' id='".$row['id']."' onmouseout='clearme();' onclick='iseeittoo(".$row['id']."); ' align=justify style='cursor:pointer;font-size:120%;'> I see it too! X <span id='count".$row['id']."'>".$row['metoo']."</span></td>";
		echo "<td class='pin' onmousedown='pin(".$row['id'].");' onmouseup='pin(".$row['id'].");' style='cursor:pointer;' align='right'><img src='./img/pin.png'</td>";
		echo "</tr>";
		$rc++;
	}

	echo "</table>";
	}
?>
