<?php
$package = $_GET[package];
$key = $_GET[key];
$link_download = file_get_contents("https://apkmonk.com/down_file/?pkg=$package&key=$key");
$url = json_decode($link_download, true);
header('Location:'.$url["url"].'');
?>