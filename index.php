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