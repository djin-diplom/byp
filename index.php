<?php
session_start();
require_once("functions.php");
require_once("requisites.php");
require_once("base.php");
require_once("route.php");
if (!$route) require_once("login_users.php");
?>

<!DOCTYPE html>
<html>
<head>
<?php
require_once("head.php");
?>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  <?php 
    if ($admin) require_once("admin.php");
	?>	
<div class="l">
  <?php
  require_once("header.php");
  ?>


  <div class="main-wrap">
    <div class="l-top">
	    <?php
		if ($route) require_once("toplist.php");
		
		require_once("l-sidebar.php");
		
		if ($route) require_once("l-main.php");
		else require_once("page.php");
		?>
	</div>
    <?php
    require_once("footer.php");
    ?>
  </div>
</div>
</body>

</html>