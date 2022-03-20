<?php
$package = $_GET['package'];
$package = str_replace('_', '.', $package); // Package
require_once "library/simple_html_dom.php";
$source = file_get_html("https://www.apkmonk.com/app/$package/"); // Source
$source = str_get_html($source);
$title = $source->find('h1[class=hide-on-large-only]', 0);
$title = $title->plaintext;
$title = str_replace('apk', 'APK', $title); // Title
$version = $source->find('table[class=striped]', 0);
$version = $version->find('span', 0);
$version = $version->plaintext; // App Version
$date = $source->find('table[class=striped]', 0);
$date = $date->find('span', 1);
$date = $date->plaintext; // Last Updated
$size = $source->find('table[class=striped]', 0);
$size = $size->find('span', 2);
$size = $size->plaintext; // App Size
$devs = $source->find('table[class=striped]', 0);
$devs = $devs->find('span', 3);
$devs = $devs->plaintext; // App Developers
$cats_link = $source->find('table[class=striped]', 0);
$cats_link = $cats_link->find('a', 0);
$cats_link = $cats_link->href;
$cats_link = str_replace('/category/','',$cats_link);
$cats_link = str_replace('/','_',$cats_link);
$cats_link = "/category/".$cats_link."page.html"; // Category Link
$cats_name = $source->find('table[class=striped]', 0);
$cats_name = $cats_name->find('a', 0);
$cats_name = $cats_name->plaintext; // Category Name
$rating = $source->find('table[class=striped]', 0);
$rating = $rating->find('td', 11);
$rating = $rating->plaintext; // Content Rating
$supp = $source->find('table[class=striped]', 0);
$supp = $supp->find('td', 13);
$supp = $supp->plaintext; // Supported
$google_play = "https://play.google.com/store/apps/details?id=".$package; // Google Play Link
$down_link = $source->find('a[id=download_button]', 0);
$down_link = $down_link->href;
$down_link = str_replace('https://www.apkmonk.com/download-app/','',$down_link);
$down_link = explode("/",$down_link);
$link_download = "/download/$down_link[0]/$down_link[1]"; // Link Download
$ss = "/cdn/".base64_encode($ss).".jpg"; // Screenshot
$perm = file_get_html("https://www.apkmonk.com/get_permissions/$package/"); // Source 2
$perm = str_get_html($perm);
$description = "Install ".$title." version ".$version." with package name ".$package." for free from ".$devs.".";
$previous = $source->find('table[class=striped]', 1);
$icon = $source->find('img[class=hide-on-med-and-down]', 0);
$icon = $icon->getAttribute('data-src');
$icon = "https://cdn.statically.io/img/hixari.me/cdn/".base64_encode($icon).".jpg";
include "include/header.php";
?>
<div class="container">
  <div class="row">
    <br/>
    <div class="col-sm-8 border-right border-left">
      <br/>
      <div class="jumbotron">
        <h2 class="display-4  h1-responsive">
          <b>
            <?php echo $title ?>
          </b>
        </h2>
        <p class="lead">
          <button type="button" class="btn btn-outline-indigo waves-effect btn-sm">Version 
            <?php echo $version; ?>
          </button>
          <button type="button" class="btn btn-outline-indigo waves-effect btn-sm">Size 
            <?php echo $size; ?>
          </button>
        </p>
        <hr class="my-2">
        <p>
          <small> This APK is free of any virus and safe to install.
          </small>
        </p>
        <a rel="nofollow" class="btn btn-indigo btn-lg btn-sm" role="button" href="<?php echo $link_download ?>">GET APK
        </a> 
        <a class="btn btn-indigo btn-lg btn-sm" role="button" href="#allver">OTHER VERSIONS
        </a>
      </div>
      <h4 class="font-bold h4-responsive">APP DETAILS <span class="badge badge-primary indigo">CHECK</span>
      </h4>
      <table class="table table-striped btn-table rounded-lg" width="100%">
        <tr>
          <td colspan="2">
            <img class="img-thumbnail" width="80" height="80" src="<?php echo $icon; ?>" alt="<?php echo $title ?>" onerror="this.onerror=null;this.src='https://cdn.statically.io/img/hixari.me/cdn/aHR0cHM6Ly9jZG4uYXBrbW9uay5jb20vbG9nb3MvY29tLmdvb2dsZS5hbmRyb2lkLmFwcHMuZG9jcy5lZGl0b3JzLmRvY3NfODB4ODAucG5n.jpg';" />
          </td>
        </tr>
        <tr>
          <td>APK Version
          </td>
          <td>
            <?php echo $version; ?>
          </td>
        </tr>
        <tr>
          <td>Date Updated
          </td>
          <td>
            <?php echo $date; ?>
          </td>
        </tr>
        <tr>
          <td>APK Size
          </td>
          <td>
            <?php echo $size; ?>
          </td>
        </tr>
        <tr>
          <td>Developers
          </td>
          <td>
            <?php echo $devs; ?>
          </td>
        </tr>
        <tr>
          <td>Tags
          </td>
          <td>
            <a href="<?php echo $cats_link; ?>" title="<?php echo $cats_name; ?>">
              <button type="button" class="btn btn-indigo btn-sm m-0">
                <?php echo $cats_name; ?>
              </button>
            </a>
          </td>
        </tr>
        <tr>
          <td>APK Rating
          </td>
          <td>
            <?php echo $rating; ?>
          </td>
        </tr>
        <tr>
          <td>Device Supported
          </td>
          <td>
            <?php echo $supp; ?>
          </td>
        </tr>
        <tr>
          <td>APK Package
          </td>
          <td class="text-truncate">
            <?php echo $package; ?>
          </td>
        </tr>
        <tr>
          <td>Store
          </td>
          <td>
            <a href="<?php echo $google_play; ?>" title="<?php echo $title; ?> - Google Play" rel="nofollow">Google Play
            </a>
          </td>
        </tr>
        <tr>
          <td>Report DMCA
          </td>
          <td>
            <button type="button" class="btn btn-indigo btn-sm m-0">fk@sgbteam.id
            </button>
          </td>
        </tr>
      </table>
      <div class="p-4 mb-3 bg-light rounded">
        <h5 class="font-bold">About 
          <?php echo $title; ?>
        </h5>
        <p class="mb-0">
          <?php echo $title; ?>, the app published by 
          <b>
            <?php echo $devs; ?>
          </b> is free of any virus, safe to install. Can be installed on 
          <?php echo $supp; ?>. What this app need?
        <ol>
          <?php echo $perm; ?>
        </ol>
        <h6 class="font-bold" id="allver">All Versions
        </h6>
        <?php
foreach ($previous->find('a') as $previous_versions) {
$link = $previous_versions->href;
$link = str_replace('/download-app/','/download/',$link);
$link = str_replace('.apk/','.apk',$link);
$name = $previous_versions->plaintext;
echo "<a class=\"btn btn-indigo btn-sm\" rel=\"nofollow\" href=\"$link\" title=\"$name\"><font color=\"white\">$name</font></a>";
}
?>
        </p>
    </div>
    <h4 class="font-bold h4-responsive">RELATED APPS <span class="badge badge-primary indigo">HOT</span>
    </h4>
    <div data-spy="scroll" data-target="#similar" data-offset="0" class="scrollspy-example z-depth-1 mt-4 rounded">
      <table class="table table-borderless">
        <?php
$i = 0;
foreach ($source->find('div[class=col l6  s6]') as $related) {
$i++;
$link1 = $related->find('a',0);
$link = $link1->href;
$link = str_replace('/app/','',$link);
$link = str_replace('/','',$link);
$link = str_replace('.','_',$link);
$link = "/app/".$link.".html";
$name1 = $related->find('a',0);
$name = $name1->title;
$name = str_replace('apk', 'APK',$name);
echo "<tr><td>$i</td><td><a href=\"$link\" title=\"$name\">$name</a></td></tr>";
}
?>
      </table>
    </div>
  </div>
  <?php include "include/footer.php"; ?>