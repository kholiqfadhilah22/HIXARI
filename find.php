<?php
$id = $_GET['key'];
$redirect = str_replace(' ','-',$id);
$redirect = "/search/".$redirect.".html";
header("Location:$redirect");
?>