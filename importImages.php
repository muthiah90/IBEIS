<!DOCTYPE html>
<html lang="en">
<head>
<title>IBEIS</title>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
<script type="text/javascript" src="sessvars.js"></script>
<script type="text/javascript">
onload = function(){

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

document.getElementById("import").setAttribute("class", "active");
}
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="newjs.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top" title="Home">
      <div class="container-fluid" id="navigationbar">
        <div class="navbar-header"> <a id="imageLink" class="navbar-brand" href="IBEIS.html"> <img src="008861-orange-grunge-sticker-icon-arrows-arrow2-upload.png" class="img-circle" width="50" height="50"></a> <a class="navbar-brand" href="IBEIS.html">Image Upload Tool</a> </div>
        <div>
          <ul class="nav navbar-nav">
            <li><a href="IBEIS.html">About</a></li>
            <li id="import"><a id="importLink">Import</a></li>
            <li id="group"><a id="groupLink">Group</a></li>
            <li id="detect"><a id="detectLink">Detect</a></li>
            <li id="identify" class="disabled"><a id="identifyLink">Identify</a></li>
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
                aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:0">
                0% Completed
            </div>
        </div>
    
    	<div style="width:500px; margin-left: 30%" align="center">
            <form enctype="multipart/form-data" action="import.php" method="post" id="formid">
                <label> <h4> Select the images that has to be uploaded </h4> </label> 
                <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-warning btn-file">
                   	Browse <span class="glyphicon glyphicon-folder-open" style="margin-left:3px"></span><input type="file" multiple id="file" name="files[]" onChange="trigger()" />
                    </span>
                </span>
                <input type="text" class="form-control" readonly/>
            	</div>
                <br>            
                <input type="submit" value="Upload Images" name="add" id="upload" class="btn btn-success" style="display:none"/>
            </form>
        </div>
        <?php
        if(is_dir("upload")) {
        exec('rmdir upload /s /q');
        mkdir("upload");
        }
        else
        mkdir("upload");
        ?>
    
        <ul class="pager">
            <li class="previous"><a href="IBEIS.html" style="color:#F29F01"> <span class="glyphicon glyphicon-chevron-left"></span> About Page</a></li>
            </ul>
    </div>
</body>
</html>