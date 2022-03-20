<?php
$id = $_GET['id'];
$id = str_replace('_','/',$id);
$page = explode('/',$id);
require_once "library/simple_html_dom.php";
$source = file_get_html("https://www.apkmonk.com/category/".$page[0]."/".$page[1]); // Source
$source = str_get_html($source);
$title = $source->find('span[id=searched-word]',0);
$page_name = $title->plaintext;
$title = $title->plaintext;
$title = "Free ".$title." Apps and Games: Page ".$page[1];
$description ="Free tons of ".$page_name." APK for your Android devices, apps and games can be downloaded easily from HIXARI page ".$page[1].".";
include "include/header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-sm-8 border-right border-left">
      <br/>
      <h3 class="pb-4 mb-4 font-bold border-bottom h3-responsive">
        <?php echo strtoupper($page_name); ?> <span class="badge badge-primary indigo">NEW</span>
      </h3>
      <div class="row">
        <?php
foreach ($source->find('div[class=col l6 m12 s12 xl4 faceout-row]') as $list) {
$title = $list->find('span[class=af-title truncate]', 0);
$title = $title->plaintext; // Title
$link = $list->find('a', 0);
$link = $link->href;
$link = str_replace('/app/', '', $link);
$link = str_replace('/', '', $link);
$desc = $link;
$link = str_replace('.', '_', $link);
$link = "/app/".$link.".html"; // Link
$image = $list->find('img', 0);
$image = $image->getAttribute('data-src');
$image = "https://cdn.statically.io/img/hixari.me/cdn/".base64_encode($image).".jpg"; // Thumbnail
echo "<div class=\"col-md-3 col-6 mb-3\">
<div class=\"card\">
<div class=\"card-body\">
<h4 class=\"card-title text-truncate h4-responsive\">$title</h4>
<p class=\"card-text\"><img alt =\"$title\"class=\"img-thumbnail\" width=\"80\" height=\"80\" src=\"$image\" onerror=\"this.onerror=null;this.src='https://cdn.statically.io/img/hixari.me/cdn/aHR0cHM6Ly9jZG4uYXBrbW9uay5jb20vbG9nb3MvY29tLmdvb2dsZS5hbmRyb2lkLmFwcHMuZG9jcy5lZGl0b3JzLmRvY3NfODB4ODAucG5n.jpg';\"/></p>
<a href=\"$link\" title=\"$title\" class=\"btn btn-indigo btn-sm\">GET APK</a>
</div>
</div>
</div>";
}
?>
      </div>
          Page: <?php
foreach ($source->find('div[class=selection side-padding-15 center]') as $pagination) {
foreach ($pagination->find('a') as $link) {
$link_cats = $link->href;
$split_link = explode('/',$link_cats);
$link_end = str_replace($link_cats,"/category/".$split_link[2]."_".$split_link[3]."_page.html",$link_cats);
echo "<a href=\"$link_end\" class=\"btn btn-indigo btn-sm\">$split_link[3]</a> ";
}
}
?>
    </div>
    <?php include "include/footer.php"; ?>