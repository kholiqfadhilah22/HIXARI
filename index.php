<?php
$title = "HIXARI: Free Android Apps and Games";
$description ="HIXARI is a free website to install various categories of applications and games for Android APK.";
require_once "library/simple_html_dom.php";
$source = file_get_html("https://www.apkmonk.com/"); // Source
$source = str_get_html($source);
include "include/header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-sm-8 border-right border-left">
      <br/>
      <h3 class="pb-4 mb-4 font-bold border-bottom h3-responsive">
        TRENDING APPS <span class="badge badge-primary indigo">HOT</span>
      </h3>
      <div class="row">
        <?php
$i = 0;
foreach ($source->find('div[class=col l6 m12 s12 xl4 faceout-row]') as $list) {
$i++;
$title = $list->find('span[class=af-title truncate]', 0);
$title = $title->plaintext; // Title
$link = $list->find('a', 0);
$link = $link->href;
$link = str_replace('/app/', '', $link);
$link = str_replace('/', '', $link);
$desc = $link;
$link = str_replace('.', '_', $link);
$link = "app/".$link.".html"; // Link
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
if ($i == 32) break;
}
?>
      </div>
    </div>
    <?php include "include/footer.php"; ?>