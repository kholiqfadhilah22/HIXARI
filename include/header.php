<?php
$site = "HIXARI";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-addons-4.19.1.min.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark indigo">
      <a class="navbar-brand" href="/">
        <?php echo $site ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
              aria-controls="basicExampleNav" aria-expanded="false" aria-label="Menu">
        <span class="navbar-toggler-icon">
        </span>
      </button>
      <div class="collapse navbar-collapse" id="basicExampleNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/privacy_policy.html">Policy
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/disclaimer.html">Disclaimer
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/top_apps.html">Apps
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/top_games.html">Games
            </a>
          </li>
        </ul>
        <form class="form-inline" method="GET" action="/search.html">
          <div class="md-form my-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="key">
          </div>
        </form>
      </div>
    </nav>
