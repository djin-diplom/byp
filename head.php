<?php
if ($route) {//Переключатель заголовков
	$title = 'Новости Беларуси - Белорусские новости - Новости Белоруссии';
	$description = 'Новости Беларуси - Белорусские новости - Новости Белоруссии - Республика Беларусь - Минск';
	$keys = 'Новости Беларуси - Белорусские новости - Новости Белоруссии - Республика Беларусь - Минск';
    $url_og = $site_name;
    $url_og_picture = $site_name."/img/metro.jpg";
} else {
	$title = htmlspecialchars($page['teme']);
	$description = htmlspecialchars($page['description']);
	$keys = htmlspecialchars($page['keys']);
    $url_og = $page['url'];
    $url_og_picture = str_replace('news', 'pictures', $page['url'])."img_1.jpg";
}
?>
<meta name="yandex-verification" content="08c2ed06216b74b4" />
<meta name="google-site-verification" content="BanPMnlL6EOfbZFxmgL7xlBX3WIZbiVDK2D49li-f0M" />

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title><?php echo $site_name; ?> :: <?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="cache-control" content="no-cache">
	<meta name="description" content="<?php echo $site_name; ?> :: <?php echo $description ?>" >
	<meta name="keywords" content="<?php echo $site_name; ?> :: <?php echo $keys; ?>">
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $site_name; ?> :: <?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $site_name; ?> :: <?php echo $description ?>" />
<meta property="og:url" content="<?php echo $site_name; ?><?php echo $url_og; ?>" />
<meta property="og:image" content="<?php echo $site_name; ?><?php echo $url_og_picture; ?>" />
<meta property="og:image:width" content="320" />
<meta property="og:image:height" content="270" />

<meta name="title" content="<?php echo $site_name; ?> :: <?php echo $title; ?>" />
<link rel="image_src" href="<?php echo $site_name; ?><?php echo $url_og_picture; ?>" />



	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $main_name; ?>/images.ico">

	<link rel="stylesheet" media="screen" href="<?php echo $main_name; ?>/index_files/screen.css">
	<link rel="stylesheet" media="screen" href="<?php echo $main_name; ?>/index_files/screen-fix.css">
	<!--[if IE]><script src="/js/html5shiv.js"></script><![endif]-->

<link rel="stylesheet" media="screen" href="<?php echo $main_name; ?>/index_files/classic-081711.css">
<script type="text/javascript" src="<?php echo $main_name; ?>/index_files/mUjileCiCX-zdqBJO6mmFaJtiV4m78ixEoiEZmr9IDM.js"></script>
<script type="text/javascript" src="<?php echo $main_name; ?>/index_files/remote.js"></script>
<script type="text/javascript" src="<?php echo $main_name; ?>/index_files/watch.js"></script>
<script type="text/javascript" src="<?php echo $main_name; ?>/index_files/www-embed-player.js"></script>



<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45281994 = new Ya.Metrika({
                    id:45281994,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45281994" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->