<!DOCTYPE html>
<html lang="en">
<head>
<title>Detect</title>
<script type="text/javascript" src="sessvars.js"></script>
<script type="text/javascript">
onload = function(){

sessvars.identifyPage = "true";

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
	document.getElementById("detectLink").setAttribute("href", "detect.html");
}
else
{
	document.getElementById("detect").setAttribute("class", "disabled");
	document.getElementById("detectLink").removeAttribute("href");
}		

document.getElementById("detect").setAttribute("class", "active");

}
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style_detect.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="zoom.js"></script>
<script src="newjs.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
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
<h4 align="center"> Step 3/5 - Detecting the species of interest from all the uploaded images</h4>
<div class="progress">
  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
  aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:50%">
    50% Completed
  </div>
</div>

<div class="row-fluid">
	<div class="col-md-8" style="float:left" >
    	<div data-spy="affix" data-offset-top="100px">
        	<?php

				//$dir = "upload";
				//
				//if (is_dir($dir)) {
				//   if ($dh = opendir($dir)) {
				
				
				//        while (($file = readdir($dh)) !== false) {
				//            if (!is_dir($dir.$file)) {
				//                $images[] = $file;
				//            }
				//        }
				
				//        closedir($dh);
				
				//        print_r($images);
				  //  }
				//}
				
				$image_file1 = 'exifimages/eleph1.jpg';
				if(file_exists($image_file1)){
				$details = exif_read_data($image_file1);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude1= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				$longitude1= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file2 = 'exifimages/eleph2.jpg';
				if(file_exists($image_file2)){
				$details = exif_read_data($image_file2);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude2= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				$longitude2= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude2;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file3 = 'exifimages/eleph3.jpg';
				if(file_exists($image_file3)){
				$details = exif_read_data($image_file3);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude3= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude1;
				$longitude3= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file4 = 'exifimages/eleph4.jpg';
				if(file_exists($image_file4)){
				$details = exif_read_data($image_file4);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude4= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude1;
				$longitude4= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude1;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file5 = 'exifimages/kang1.jpg';
				if(file_exists($image_file5)){
				$details = exif_read_data($image_file5);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude5= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude5;
				$longitude5= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude5;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file6 = 'exifimages/kang2.jpg';
				if(file_exists($image_file6)){
				$details = exif_read_data($image_file6);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude6= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude1;
				$longitude6= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude1;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file7 = 'exifimages/kang3.jpg';
				if(file_exists($image_file7)){
				$details = exif_read_data($image_file7);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude7= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude7;
				$longitude7= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude7;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file8 = 'exifimages/kang4.jpg';
				if(file_exists($image_file8)){
				$details = exif_read_data($image_file8);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude8= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude8= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file9 = 'exifimages/li1.jpg';
				if(file_exists($image_file9)){
				$details = exif_read_data($image_file9);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude9= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude9= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file10 = 'exifimages/li2.jpg';
				if(file_exists($image_file10)){
				$details = exif_read_data($image_file10);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude10= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude10= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file11 = 'exifimages/li3.jpg';
				if(file_exists($image_file11)){
				$details = exif_read_data($image_file11);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude11= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude11= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file12 = 'exifimages/li4.jpg';
				if(file_exists($image_file12)){
				$details = exif_read_data($image_file12);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude12= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude12= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file13 = 'exifimages/pan1.jpg';
				if(file_exists($image_file13)){
				$details = exif_read_data($image_file13);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude13= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude13= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file14 = 'exifimages/pan2.jpg';
				if(file_exists($image_file14)){
				$details = exif_read_data($image_file14);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude14= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude14= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file15 = 'exifimages/pan3.jpg';
				if(file_exists($image_file15)){
				$details = exif_read_data($image_file15);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude15= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude15= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file16 = 'exifimages/pan4.jpg';
				if(file_exists($image_file16)){
				$details = exif_read_data($image_file16);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude16= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude16;
				$longitude16= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude16;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file17 = 'exifimages/zeb1.jpg';
				if(file_exists($image_file17)){
				$details = exif_read_data($image_file17);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude17= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude17= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file18 = 'exifimages/zeb2.jpg';
				if(file_exists($image_file18)){
				$details = exif_read_data($image_file18);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude18= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude18= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file19 = 'exifimages/zeb3.jpg';
				if(file_exists($image_file19)){
				$details = exif_read_data($image_file19);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude19= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude19= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				$image_file20 = 'exifimages/zeb4.jpg';
				if(file_exists($image_file20)){
				$details = exif_read_data($image_file20);
				$sections = explode(',',$details['SectionsFound']);
				
				if(in_array('GPS',array_flip($sections))){
				$latitude20= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
				//echo $latitude8;
				$longitude20= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
				//echo $longitude8;
				}else{
				die('GPS data not found');
				}
				}else{
				die('File does not exists');
				}
				
				//$markers = array("$latitude, $longitude");
				//print_r($markers);
				
				function format_gps_data($gpsdata,$lat_lon_ref){
				$gps_info = array();
				foreach($gpsdata as $gps){
				list($j , $k) = explode('/', $gps);
				array_push($gps_info,$j/$k);
				}
				$coordination = $gps_info[0] + ($gps_info[1]/60.00) + ($gps_info[2]/3600.00);
				return (($lat_lon_ref == "S" || $lat_lon_ref == "W" ) ? '-'.$coordination : $coordination);
				}
				
				?>
             
              <div id="map" style="width: 500px; height: 550px; margin-top:-10px; padding-right: 100px"></div>
              <script type="text/javascript">
var locations = [
      ['Elephant1', <?php echo $latitude1; ?>,<?php echo $longitude1; ?>, 'exifimages/eleph1.jpg'],
      ['Elephant2', <?php echo $latitude2; ?>,<?php echo $longitude2; ?>, 'exifimages/eleph2.jpg'],
      ['Elephant3', <?php echo $latitude3; ?>,<?php echo $longitude3; ?>, 'exifimages/eleph3.jpg'],
      ['Elephant4', <?php echo $latitude4; ?>,<?php echo $longitude4; ?>, 'exifimages/eleph4.jpg'],
      ['Kangaroo1', <?php echo $latitude5; ?>,<?php echo $longitude5; ?>, 'exifimages/kang1.jpg'],
      ['Kangaroo2', <?php echo $latitude6; ?>,<?php echo $longitude6; ?>, 'exifimages/kang2.jpg'],
      ['Kangaroo3', <?php echo $latitude7; ?>,<?php echo $longitude7; ?>, 'exifimages/kang3.jpg'],
      ['Kangaroo4', <?php echo $latitude8; ?>,<?php echo $longitude8; ?>, 'exifimages/kang4.jpg'],
      ['Lion1', <?php echo $latitude9; ?>,<?php echo $longitude9; ?>, 'exifimages/li1.jpg'],
      ['Lion2', <?php echo $latitude10; ?>,<?php echo $longitude10; ?>, 'exifimages/li2.jpg'],
      ['Lion3', <?php echo $latitude11; ?>,<?php echo $longitude11; ?>, 'exifimages/li3.jpg'],
      ['Lion4', <?php echo $latitude12; ?>,<?php echo $longitude12; ?>, 'exifimages/li4.jpg'],
      ['Panda1', <?php echo $latitude13; ?>,<?php echo $longitude13; ?>, 'exifimages/pan1.jpg'],
      ['Panda2', <?php echo $latitude14; ?>,<?php echo $longitude14; ?>, 'exifimages/pan2.jpg'],
      ['Panda3', <?php echo $latitude15; ?>,<?php echo $longitude15; ?>, 'exifimages/pan3.jpg'],
      ['Panda4', <?php echo $latitude16; ?>,<?php echo $longitude16; ?>, 'exifimages/pan4.jpg'],
      ['Zebra1', <?php echo $latitude17; ?>,<?php echo $longitude17; ?>, 'exifimages/zeb1.jpg'],
      ['Zebra2', <?php echo $latitude18; ?>,<?php echo $longitude18; ?>, 'exifimages/zeb2.jpg'],
      ['Zebra3', <?php echo $latitude19; ?>,<?php echo $longitude19; ?>, 'exifimages/zeb3.jpg'],
      ['Zebra4', <?php echo $latitude20; ?>,<?php echo $longitude20; ?>, 'exifimages/zeb4.jpg']
    ];

var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(43.6666068,-79.5030274),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

      for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
	map: map,
	animation: google.maps.Animation.DROP,
	icon: locations[i][3]
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

        </div>
    </div>
    <div class="col-md-9" style="float:right;padding-left: 200px">
    		<div style="display:inline-block; float:right; clear:left; margin-top:-5px; margin-bottom:15px">
                <span id="zoom" class="glyphicon glyphicon-zoom-in"> </span> 
                <div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a id="adjuster" title			="zoom" class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 84.6153846153846%;"></a></div>
                <span id="zoom" class="glyphicon glyphicon-zoom-out"></span>
            </div>
        <br><br><br>
            <div class="zoomslide" style="clear:both">
    
	<div style="margin-top:-10px">
	<label style="display:inline-block; padding-left:10px; margin-left:130px; font-size:17px"> Select your species of interest </label>
    <select id="mySelect" class="form-control" style="width:300px; display:inline-block; margin-left:20px">
      <option value="" style="display:none">Please select Species</option>
      <option value="elephant">Elephant</option>
      <option value="kangaroo">Kangaroo</option>
      <option value="lion">Lion</option>
      <option value="panda">Panda</option>
      <option value="zebra">Zebra</option>
    </select>
    <br>
    <br>
    <div class="zebras">
    <div id="zebra" class="zebras, img-thumbnail">
        <img id="zImage1" src="images/zebra1.jpg" height=150 width=150>
    </div>
    
    <div id="zebra" class="zebras, img-thumbnail">
        <img id="zImage2" src="images/zebra2.jpg" height=150 width=150>
    </div>
    
    <div id="zebra" class="zebras, img-thumbnail">
        <img id="zImage3" src="images/zebra3.jpg" height=150 width=150>
    </div>
    
    <div id="zebra" class="zebras, img-thumbnail">
        <img id="zImage4" src="images/zebra4.jpg" height=150 width=150>
    </div>
    </div>
    
    <div class="lions">
    <div id="lion1" class="lions, img-thumbnail">
        <img id="lImage1" src="images/lion1.jpg" border=4 height=150 width=150>
    </div>
    
    <div id="lion2" class="lions, img-thumbnail">
        <img id="lImage2" src="images/lion2.jpg" border=4 height=150 width=150>
    </div>
    
    <div id="lion3" class="lions, img-thumbnail">
        <img id="lImage3" src="images/lion3.jpg" border=4 height=150 width=150>
    </div>
    
    <div id="lion4" class="lions, img-thumbnail">
        <img id="lImage4" src="images/lion4.jpg" border=4 height=150 width=150>
    </div>
    </div>
    
    <div class="kangaroos">
    <div id="kangaroo1" class="kangaroos, img-thumbnail">
        <img id="kImage1" src="images/kangaroo1.jpg" border=4 height=150 width=150>
    </div>
    <div id="kangaroo2" class="kangaroos, img-thumbnail">
        <img id="kImage2" src="images/kangaroo2.jpg" border=4 height=150 width=150>
    </div>
    <div id="kangaroo3" class="kangaroos, img-thumbnail">
        <img id="kImage3" src="images/kangaroo3.jpg" border=4 height=150 width=150>
    </div>
    <div id="kangaroo4" class="kangaroos, img-thumbnail">
        <img id="kImage4" src="images/kangaroo4.jpg" border=4 height=150 width=150>
    </div>
    </div>
    
    <div class="pandas">
    <div id="panda1" class="pandas, img-thumbnail">
        <img id="pImage1" src="images/panda1.jpg" border=4 height=150 width=150>
    </div>
    <div id="panda2" class="pandas, img-thumbnail">
        <img id="pImage2" src="images/panda2.jpg" border=4 height=150 width=150>
    </div>
    <div id="panda3" class="pandas, img-thumbnail">
        <img id="pImage3" src="images/panda3.jpg" border=4 height=150 width=150>
    </div>
    <div id="panda4" class="pandas, img-thumbnail">
        <img id="pImage4" src="images/panda4.jpg" border=4 height=150 width=150>
    </div>
    </div>
    
    <div class="elephants">
    <div id="elephant1" class="elephants, img-thumbnail">
        <img id="eImage1" src="images/elephant1.jpg" border=4 height=150 width=150>
    </div>
    <div id="elephant2" class="elephants, img-thumbnail">
        <img id="eImage2" src="images/elephant2.jpg" border=4 height=150 width=150>
    </div>
    <div id="elephant3" class="elephants, img-thumbnail">
        <img id="eImage3" src="images/elephant3.jpg" border=4 height=150 width=150>
    </div>
    <div id="elephant4" class="elephants, img-thumbnail">
        <img id="eImage4" src="images/elephant4.jpg" border=4 height=150 width=150>
    </div>
    </div>
    <script>
    $(function(){
    $('#mySelect').change(function(){
        var x = $( '#mySelect option:selected').val();
		
		if(x == "zebra") {
			$('.zebras').removeClass('blur');
			$('.lions').addClass('blur');
			$('.elephants').addClass('blur');
			$('.pandas').addClass('blur');
			$('.kangaroos').addClass('blur');
			$('#identifyStepLink').attr('href', 'identify_zebra.html');
			$('#identifyStep').removeClass('disabled');
			$('#identify').removeClass('disabled');
			$('#identifyLink').attr('href', 'identify_zebra.html');
			$('#zImage1').attr('src', 'boxedimages/zebra1.jpg');
			$('#zImage2').attr('src', 'boxedimages/zebra2.jpg');
			$('#zImage3').attr('src', 'boxedimages/zebra3.jpg');
			$('#zImage4').attr('src', 'boxedimages/zebra4.jpg');
			}
		if(x == "elephant") {
			$('.elephants').removeClass('blur');
			$('.lions').addClass('blur');
			$('.zebras').addClass('blur');
			$('.pandas').addClass('blur');
			$('.kangaroos').addClass('blur');
			$('#identifyStepLink').attr('href', 'identify_elephant.html');
			$('#identifyStep').removeClass('disabled');
			$('#identify').removeClass('disabled');
			$('#identifyLink').attr('href', 'identify_elephant.html');
			$('#eImage1').attr('src', 'boxedimages/elephant1.jpg');
			$('#eImage2').attr('src', 'boxedimages/elephant2.jpg');
			$('#eImage3').attr('src', 'boxedimages/elephant3.jpg');
			$('#eImage4').attr('src', 'boxedimages/elephant4.jpg');
			}
		if(x == "kangaroo") {
			$('.kangaroos').removeClass('blur');
			$('.lions').addClass('blur');
			$('.elephants').addClass('blur');
			$('.pandas').addClass('blur');
			$('.zebras').addClass('blur');
			$('#identifyStepLink').attr('href', 'identify_kangaroo.html');
			$('#identifyStep').removeClass('disabled');
			$('#identify').removeClass('disabled');
			$('#identifyLink').attr('href', 'identify_kangaroo.html');
			$('#kImage1').attr('src', 'boxedimages/kangaroo1.jpg');
			$('#kImage2').attr('src', 'boxedimages/kangaroo2.jpg');
			$('#kImage3').attr('src', 'boxedimages/kangaroo3.jpg');
			$('#kImage4').attr('src', 'boxedimages/kangaroo4.jpg');
			}
		if(x == "lion") {
			$('.lions').removeClass('blur');
			$('.zebras').addClass('blur');
			$('.elephants').addClass('blur');
			$('.pandas').addClass('blur');
			$('.kangaroos').addClass('blur');
			$('#identifyStepLink').attr('href', 'identify_lion.html');
			$('#identifyStep').removeClass('disabled');
			$('#identify').removeClass('disabled');
			$('#identifyLink').attr('href', 'identify_lion.html');
			$('#lImage1').attr('src', 'boxedimages/lion1.jpg');
			$('#lImage2').attr('src', 'boxedimages/lion2.jpg');
			$('#lImage3').attr('src', 'boxedimages/lion3.jpg');
			$('#lImage4').attr('src', 'boxedimages/lion4.jpg');
			}
		if(x == "panda") {
			$('.pandas').removeClass('blur');
			$('.lions').addClass('blur');
			$('.elephants').addClass('blur');
			$('.zebras').addClass('blur');
			$('.kangaroos').addClass('blur');
			$('#identifyStepLink').attr('href', 'identify_panda.html');
			$('#identifyStep').removeClass('disabled');
			$('#identify').removeClass('disabled');
			$('#identifyLink').attr('href', 'identify_panda.html');
			$('#pImage1').attr('src', 'boxedimages/panda1.jpg');
			$('#pImage2').attr('src', 'boxedimages/panda2.jpg');
			$('#pImage3').attr('src', 'boxedimages/panda3.jpg');
			$('#pImage4').attr('src', 'boxedimages/panda4.jpg');
			}
		
		
			
		});
		});
		</script>
</div>
<div style="clear:both">
<ul class="pager">
    <li class="previous"><a href="group.php" style="color:#F29F01"> <span class="glyphicon glyphicon-chevron-left"></span> Previous Step</a></li>
    <li id="identifyStep" class="next, disabled"><a id="identifyStepLink" style="color:#F29F01"> Next Step<span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
</div>
</div>
</div>
</body>
</html>
