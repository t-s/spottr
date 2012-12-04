<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/html1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>cloudspottr</title>
  <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
  <script type="text/javascript" src="./scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/style.css" />
  <script type="text/javascript" src="./canvas.js"></script>

</head>

<body align="center">
<div class="header">
    <div class='title3 titlealign' style="font-size:400%">cloudspottr</div>
    </div><hr>
		<div>
		<img align="right" style="position:absolute; float:left;" width=15% src="./imgs/cld.png">
		<div id="canvasDiv" onmouseover="this.style.cursor='default';" onmousedown="this.style.cursor='default';">
		</div></div>
		<button style="z-index:100;height:30px;width:80px;position:relative;left:210px;" type="button" value="clear" onclick="clearme();" />clear</button>
		<div class='title3' style="font-size:100%; position:relative;bottom:20px;"<p>What do you see?</p></div>
		<input type="text" id="see">&nbsp;&nbsp;&nbsp;
		<input style="height:30px;width:100px;" type="button" value="I see this!" onclick="insert(1,see.value,document.getElementById('canvas').toDataURL());document.getElementById('see').value='';clearme();">
	<br /><br /><br />
	<div id="prev" class='title3' style='font-size:100%'>
	</div>
</div> 


</body>
</html>
