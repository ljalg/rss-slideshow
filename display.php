<?php include_once('defaults.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 
			if ($utf== 'y') {
				echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
			} else {
				echo '<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">';
			}
	?>
<title>RSS Slideshow</title>
<link rel="stylesheet" href="style/rssslideshow_main.css" media="screen" />
<link rel="stylesheet" href="<?php echo($css); ?>" media="screen" />

<!-- include jQuery library -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- include Cycle plugin -->
<script type="text/javascript" src="js/jquery.cycle.all.latest.js"></script>

<!-- run Cycle plugin -->
<script type="text/javascript">
$(document).ready(function() {
    $('.rss-items').cycle( {
	 	<?php echo $ssoptions ?>
    });
});
</script>
<noscript>Please ensure you have javascript enabled to run RSS Slideshow.</noscript>
</head>
<body>

<script language="JavaScript" src="<?php echo $rss_str ?>" charset="UTF-8" type="text/javascript"></script>

<a id="powered" href="<?php echo($_SERVER['REQUEST_URI']) ?>" target="_blank">powered by RSS Slideshow</a>
</body>
</html>
