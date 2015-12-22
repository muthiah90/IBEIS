<!DOCTYPE html>
<html lang="en">
<head>
<title>IBEIS</title>

<script type="text/javascript" src="sessvars.js"></script>
<script type="text/javascript">
onload = function(){
sessvars.groupPage = "true";

if(sessvars.importPage == "true")
{
	document.getElementById("import").removeAttribute("class");
	document.getElementById("importLink").setAttribute("href", "importImages.php");
}
else
{
	document.getElementById("import").setAttribute("class", "disabled");
	document.getElementById("importLink").removeAttribute("href");
}

if(sessvars.groupPage == "true")
{
	document.getElementById("group").removeAttribute("class");
	document.getElementById("groupLink").setAttribute("href", "group.php");
}
else
{
	document.getElementById("group").setAttribute("class", "disabled");
	document.getElementById("groupLink").removeAttribute("href");
}

if(sessvars.detectPage == "true")
{
	document.getElementById("detect").removeAttribute("class");
	document.getElementById("detectLink").setAttribute("href", "detect.php");
}
else
{
	document.getElementById("detect").setAttribute("class", "disabled");
	document.getElementById("detectLink").removeAttribute("href");
}

if(sessvars.identifyPage == "true")
{
	document.getElementById("identify").removeAttribute("class");
	document.getElementById("identifyLink").setAttribute("href", "identify_zebra.html");
}
else
{
	document.getElementById("identify").setAttribute("class", "disabled");
	document.getElementById("identifyLink").removeAttribute("href");
}	

document.getElementById("import").setAttribute("class", "active");

}
</script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
<script src="zoom.js"></script>
<script src="newjs.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>





</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" id="navigationbar" title="Home">
    <div class="navbar-header"> <a id="imageLink" class="navbar-brand" href="IBEIS.html"> <img src="008861-orange-grunge-sticker-icon-arrows-arrow2-upload.png" class="img-circle" width="50" height="50"></a> <a class="navbar-brand" href="IBEIS.html">Image Upload Tool</a> </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="IBEIS.html">About</a></li>
        <li id="import"><a id="importLink">Import</a></li>
        <li id="group"><a id="groupLink">Group</a></li>
        <li id="detect"><a id="detectLink">Detect</a></li>
        <li id="identify"><a id="identifyLink">Identify</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="contact.html"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
      </ul>
    </div>
  </div>
</div>
  <div id="mainDiv">
	<h4 align="center"> Step 1/5 - Import the sighting images that you want to upload to the IBEIS database</h4>
	<div class="progress">
  		<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
  			aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    		10% Completed
  		</div>
	</div>
    <div style="display:inline-block; float:left; margin-bottom: 10px">
    		<form enctype="multipart/form-data" action="import.php" method="post" id="formid">
        		
                <div class="input-group" style="display:inline-block">
                <label style="padding-left:5px; padding-right:5px">Add more images </label>
                <span class="input-group-btn" style="display:inline; border-radius:2px">
                    <span class="btn btn-warning btn-file" style="border-radius:3px">
                   		Add <span class="glyphicon glyphicon-plus-sign" style="margin-left:3px"></span><input type="file" multiple id="fileadd" name="files[]" onChange="trigger()"/>
                    </span>
                </span>
                <br>            
                <input type="submit" name="add" style="display:none"/>
            </form>
            
            <form enctype="multipart/form-data" method="post" action="import.php" class="formdelete">
                <label style="padding-left:5px; padding-right:5px; padding-top: 25px"> Select images for deleting </label>
                <input type="submit" name="del" value="Delete" class="btn btn-warning"/>
				<label style="padding-left:20px"> Select all images </label><input type="checkbox" name="all" onclick="triggerall()" class="checkbox-inline" style="margin-left:5px"/>
                </div>

    </div>
  	<div style="display:inline-block; float:right; clear:left; margin-top:-70px; margin-bottom:15px">
		<span id="zoom" class="glyphicon glyphicon-zoom-in"> </span> 
		<div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a id="adjuster" title			="zoom" class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 84.6153846153846%;"></a></div>
		<span id="zoom" class="glyphicon glyphicon-zoom-out"></span>
  	</div>
<br><br><br>
	<div class="zoomslide" style="clear:both">
		<?php
			$aj=0;
			
			
			
			
			if (isset($_POST['add'])) {
			$count = 0;
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$validextensions = array("jpeg", "jpg", "JPG","PNG","png");      // Extensions which are allowed.
			
				foreach ($_FILES['files']['name'] as $i => $name) {
				$ext = explode('.', basename($_FILES['files']['name'][$i]));   // Explode file name from dot(.)
				$file_extension = end($ext);
				   
					if (strlen($_FILES['files']['name'][$i]) > 1 && in_array($file_extension, $validextensions)) {
						if (move_uploaded_file($_FILES['files']['tmp_name'][$i], 'upload/'.$name)) {
							$count++;  
						}
					}
				
				}
			$aj=1;
			}
			
			}
			if(isset($_POST['del'])) {
			if(isset($_POST['checkbox'])){
			$number = count($_POST['checkbox']);
			$dirname = "./upload/";
			for ($x = 0; $x < $number; $x++) {
							unlink($dirname.$_POST['checkbox'][$x]);
						}
			}
			
			$aj=1;
			}
			
			
			if($aj==1) {
			$i=0; 
			$dirname = "./upload/";
			$images = scandir($dirname);
			$ignore = Array(".", "..");
			foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
			$i=$i+1;
			echo "<input type='checkbox' name='checkbox[]' value='$curimg' class='$i' style='display:none'/>";
			echo "<img src='./upload/$curimg' id='$i' onclick='check($i)' class='imageDiv' style='margin-left: 5px; margin-top: 5px' height='200' width='200'/>";
			}
			}
			echo "</form>";     
			}			
		?>

	</div>

	<div style="clear:both; padding-top: 10px" >
		<ul class="pager">
    		<li class="previous"><a href="IBEIS.html" style="color:#F29F01"> <span class="glyphicon glyphicon-chevron-left"></	span> About Page</a></li>
    		<li class="next"><a href="group.php" style="color:#F29F01"> Next Step<span class="glyphicon glyphicon-chevron-right"></span></a></li>
		</ul>
	</div>
</div>
</body>
</html>