<div class="col-sm-4">
  <br/>
  <div class="p-4 mb-3 bg-light rounded">
    <h4 class="font-bold">About
    </h4>
    <p class="mb-0">
      <b>
        <?php echo $site ?>
      </b> is a free website to install various categories of applications and games for Android. 
    </p>
  </div>
  <div class="p-4 bg-light rounded">
    <h4 class="font-bold">Categories
    </h4>
    <?php
require_once "library/simple_html_dom.php";
$source_2 = file_get_html("https://www.apkmonk.com/categories/"); // Source
$source_2 = str_get_html($source_2);
foreach ($source_2->find('div[class=col s6 m3 l2 faceout-row center af-secondary]') as $category) {
$title = $category->find('span[class=af-body truncate]', 0);
$title = $title->plaintext;
$link = $category->find('a', 0);
$link = $link->href;
$link = str_replace('/category/','',$link);
$link = str_replace('/','_',$link);
$link = "/category/".$link."page.html";
echo "<a href=\"$link\" title=\"$title\" class=\"btn btn-indigo btn-sm\"><font color=\"white\">$title</font></a>";
}
?>
  </div>
</div>
</div>
</div>
<div class="page-footer font-small indigo pt-4 mt-4">
  <div class="footer-copyright text-center py-3">
    <font color="white">Copyright &copy; 2020-2021 
      <b><?php echo $site; ?></b>
      <br/>
      <small>All Rights Reserved
      </small>
    </font>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
</body>
</html>
