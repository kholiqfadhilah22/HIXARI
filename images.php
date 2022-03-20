<?php
$path = $_GET['path'];
$path = base64_decode($path);
header('Content-type: image/jpeg');
$image = file_get_contents($path);
echo $image;
?>