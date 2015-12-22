<!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js"></script>
</head>
<body>

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

$image_file1 = 'Horse1.jpg';
if(file_exists($image_file1)){
$details = exif_read_data($image_file1);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude1= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude1;
echo '<br/>';
$longitude1= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude1;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file2 = 'Horse2.jpg';
if(file_exists($image_file2)){
$details = exif_read_data($image_file2);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude2= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude2;
echo '<br/>';
$longitude2= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude2;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file3 = 'Tiger1.jpg';
if(file_exists($image_file3)){
$details = exif_read_data($image_file3);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude3= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude1;
echo '<br/>';
$longitude3= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude1;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file4 = 'Tiger2.jpg';
if(file_exists($image_file4)){
$details = exif_read_data($image_file4);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude4= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude1;
echo '<br/>';
$longitude4= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude1;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file5 = 'Zebra1.jpg';
if(file_exists($image_file5)){
$details = exif_read_data($image_file5);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude5= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude5;
echo '<br/>';
$longitude5= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude5;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file6 = 'Zebra2.jpg';
if(file_exists($image_file6)){
$details = exif_read_data($image_file6);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude6= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude1;
echo '<br/>';
$longitude6= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude1;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file7 = 'Zebra3.jpg';
if(file_exists($image_file7)){
$details = exif_read_data($image_file7);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude7= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude7;
echo '<br/>';
$longitude7= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
//echo $longitude7;
}else{
die('GPS data not found');
}
}else{
die('File does not exists');
}

$image_file8 = 'Zebra4.jpg';
if(file_exists($image_file8)){
$details = exif_read_data($image_file8);
$sections = explode(',',$details['SectionsFound']);

if(in_array('GPS',array_flip($sections))){
$latitude8= format_gps_data($details['GPSLatitude'],$details['GPSLatitudeRef']);
//echo $latitude8;
echo '<br/>';
$longitude8= format_gps_data($details['GPSLongitude'],$details['GPSLongitudeRef']);
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


  <div id="map" style="width: 600px; height: 700px;"></div>
 <script type="text/javascript">
var locations = [
      ['Horse1', <?php echo $latitude1; ?>,<?php echo $longitude1; ?>, 'Horse1.jpg'],
      ['Horse2', <?php echo $latitude2; ?>,<?php echo $longitude2; ?>, 'Horse2.jpg'],
      ['Tiger1', <?php echo $latitude3; ?>,<?php echo $longitude3; ?>, 'Tiger1.jpg'],
      ['Tiger2', <?php echo $latitude4; ?>,<?php echo $longitude4; ?>, 'Tiger2.jpg'],
      ['Zebra1', <?php echo $latitude5; ?>,<?php echo $longitude5; ?>, 'Zebra1.jpg'],
      ['Zebra2', <?php echo $latitude6; ?>,<?php echo $longitude6; ?>, 'Zebra2.jpg'],
      ['Zebra3', <?php echo $latitude7; ?>,<?php echo $longitude7; ?>, 'Zebra3.jpg'],
      ['Zebra4', <?php echo $latitude8; ?>,<?php echo $longitude8; ?>, 'Zebra4.jpg']
    ];

var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(43.678216,-79.3917909),
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
</body>

</html>