<?php
include_once('defaults.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title>Build an RSS Slideshow</title>
	<META NAME="keywords" CONTENT="digital signage, rss, slideshow, display, feed, open source, free">
	<META NAME="description" CONTENT="Open source tool which displays RSS feed items in a slideshow fashion">
	<META HTTP-EQUIV="Content-Language" CONTENT="en-GB">
	
	<link rel="stylesheet" href="style/build.css" media="all" />
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all" />
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

	<script>
	/* accordian function to make pretty display */
		$(function() {
			$( "#accordion" ).accordion({ collapsible: true,  active: false, autoHeight: false });
		});
	
	/* function to check if valid URL is entered */
		function check_it() {
	     var theurl=document.builder.src.value;
	     var tomatch= /(https?|feed):\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/
	     if (tomatch.test(theurl))
	     {  
	     		builder.submit;
	     		return true;
	     }
	     else
	     {
	     	window.alert("Please enter a valid URL for your RSS feed, the one you entered is invalid."); 
			return false;     
	     }
		}
	</script>
</head>
<body>
<div id="content">
<?php
include_once('header.php');
?>
<p class="instructions">Make your selections below and select the "Slideshow" button to start your slideshow. 
Check out this <a href="display.php?src=http://rssslideshow.algaze.org/example_feed.rss&css=white&fx=fade&Slideshow=Slideshow&chan=y&num=0&desc=1&to=4000&si=1000&so=1000&tz=feed&targ=n&html=y&utf=y" target="_blank">Example</a> to test it out.</p>

<form method="get" action="display.php"  name="builder" onSubmit="return check_it();return false;">

<div class="option" style="border: none;">
	<div class="optiontitle">Feed URL</div>
	<div class="optioninput"><input type="text" name="src" size="30" value="<?php echo $src?>"></div>
	<div class="optionnote">Enter the web address of the RSS Feed (must be in http:// format, not feed://).  
	<br>Note: Please verify the URL of your feed (make sure it presents raw RSS) 
	and <a href="https://feedvalidator.org/" onClick="window.open('https://feedvalidator.org/check.cgi?url=' + encodeURIComponent(document.builder.src.value), 'check'); return false;">check that it is valid</a>  
	before using this form.</div>
</div>
<div>After starting slideshow, you can <a href="about.php#fullscreen" target="_blank">fullscreen your browser</a>.</div>
<button class="slideshow_button" name="Slideshow" value="Slideshow" type="submit">Slideshow</button>

<div id="accordion">
	<h3><a href="#">Style</a></h3>
	<div>
		<div class="option">
			<div class="optiontitle">Select Style</div>
			<div class="optioninput">
				<select name="css">
				<option value="black" label="Black">Black</option>
				<option value="white" label="White">White</option>
				</select>
			</div>
			<div class="optionnote">Select a style</div>
		</div>	
		<div class="option">
			<div class="optiontitle">Transitions</div>
			<div class="optioninput"><input type="text" name="fx" size="20" value="<?php echo $fx?>" /></div>
			<div class="optionnote">input a transition or several separated by commas, <a href="http://malsup.com/jquery/cycle/browser.html" target="_blank">Transition options</a></div>
		</div>
		<div class="optionlast">
			<div class="optiontitle">Random Transitions</div>	
			<div class="optioninput"><input type="checkbox" name="random" <?php if($random) echo('checked') ?> /></div> 
			<div class="optionnote">if multiple effects are specified</div>
		</div>
		
	</div>
	
	<h3><a href="#">Feed Channel</a></h3>
	<div>
		<div class="optionlast">
			<div class="optiontitle">Show channel Information?</div>
			<div class="optioninput">
			<input type="radio" name="chan" value="y" <?php if ($chan=='y') echo 'checked="checked"'?> /> All items (title, description & image) <br>
			<input type="radio" name="chan" value="noimage" <?php if ($chan=='title') echo 'checked="checked"'?>/> title & description only<br>
			<input type="radio" name="chan" value="title" <?php if ($chan=='title') echo 'checked="checked"'?>/> title only <br>
			<input type="radio" name="chan" value="n" <?php if ($chan=='n') echo 'checked="checked"'?>/> No Channel Information
			</div>
			<div class="optionnote"></div>
		</div>
		
	</div>
	
	<h3><a href="#">Feed Items</a></h3>
	<div>
		<div class="option">
			<div class="optiontitle">Number of items to display.</div>
			<div class="optioninput"><input type="text" name="num" size="10" value="<?php echo $num?>"></div>
			<div class="optionnote">Enter the number of items to be displayed (enter 0 to show all available)</div>
		</div>	
		<div class="option">
			<div class="optiontitle">Show/Hide item descriptions? How much?</div>
			<div class="optioninput"><input type="text" name="desc" size="10" value="<?php echo $desc?>"></div>
			<div class="optionnote">
				-1 = no item title, just item content<br>
				0 = no content, just title<br>
				1 = show full content<br>
				>1 = display first n characters of content<br>
			</div>
		</div>
		<div class="option">
			<div class="optiontitle">Show item author?</div>
			<div class="optioninput"><input type="checkbox" name="auth" value="y" <?php if($auth=='y') echo('checked') ?> />
			</div>
			<div class="optionnote"></div>
		</div>		
		<div class="option">
			<div class="optiontitle">Show item posting date?</div>
			<div class="optioninput"><input type="checkbox" name="date" value="y" <?php if($date=='y') echo('checked') ?> /></div>
			<div class="optionnote"></div>
		</div>	
			<div class="option">
			<div class="optiontitle">Randomize Items</div>
			<div class="optioninput"><input type="checkbox" name="reffects" <?php if($reffects) echo('checked') ?> /></div>  
			<div class="optionnote">view items in random order</div>
		</div>
		<div class="optionlast">
			<div class="optiontitle">No Wrap</div>
			<div class="optioninput"><input type="checkbox" name="nowrap" <?php if($nowrap) echo('checked') ?> /></div> 
			<div class="optionnote">only show each item once</div>
		</div>	
		
	</div>
	
	<h3><a href="#">Timing</a></h3>
	<div>
		<div class="option">
			<div class="optiontitle">Automatic Fullscreen</div>
			<div class="optioninput">Planned future functionality; to bring to full screen select F11 and then F5 to refresh page.</div>
			<div class="optionnote">Open Slideshow in full screen Browser</div>
		</div>	
		<div class="option">
			<div class="optiontitle">Timeout</div>
			<div class="optioninput"><input type="text" name="to" size="10" value="<?php echo $to?>" /></div>
			<div class="optionnote">Time to display each item in milliseconds</div>
		</div>	
		<div class="option">
			<div class="optiontitle">SpeedIn</div>
			<div class="optioninput"><input type="text" name="si" size="10" value="<?php echo $si?>" /></div>
			<div class="optionnote">Transition time in, in milliseconds</div>
		</div>	
		<div class="option">
			<div class="optiontitle">SpeedOut</div>
			<div class="optioninput"><input type="text" name="so" size="10" value="<?php echo $so?>" /></div>
			<div class="optionnote">Transition time out in milliseconds</div>
		</div>	
		<div class="option">
			<div class="optiontitle">Backwards</div>
			<div class="optioninput"><input type="checkbox" name="bward" <?php if($bward) echo('checked') ?> /></div>
			<div class="optionnote">show items in reverse order</div>
		</div>	
		<div class="optionlast">
			<div class="optiontitle">Pause</div>
			<div class="optioninput"><input type="checkbox" name="pause" <?php if($pause) echo('checked') ?> /></div>  
			<div class="optionnote">Pause slideshow on mouse hover</div>
		</div>	
		
	</div>
	
	<h3><a href="#">Advanced</a></h3>
	<div>
		<div class="option">
			<div class="optiontitle">Time Zone Offset</strong></div>
			<div class="optioninput"><input type="text" name="tz" size="10" value="<?php echo $tz?>"></div>
			<div class="optionnote">
				(+n/-n/'feed') Date and timer are converted to GMT time; to have display in local time, 
				you must enter an offset from your current local time to <strong><?php echo gmdate("r")?> (GMT)</strong>. 
			 	If your local time is 5 hours before GMT, enter <code>-5</code>. 
			 	If your local time is 8 hours past GMT, enter <code>+8</code>. 
			 	Fractional offsets such as +10:30 must be entered as decimal <code>+10.5</code>. 
			 	If you prefer to just display the date is recorded in the RSS, use a value = <code>feed</code>
			</div>
		</div>	
		<div class="option">
			<div class="optiontitle">Target links in the new window?</div>
			<div class="optioninput">
				<input type="text" name="targ" size="10" value="<?php echo $targ?>"></div>
			<div class="optionnote">
				n="no, links open the same page"<br>
				y="yes, open links in a new window"<br>
				"xxxx" = open links in a frame named 'xxxx'<br>
				'popup' = use a <a href="popup.js">JavaScript function</a> <code>popupfeed()</code> to open in new window
			</div>
		</div>	
		<div class="option">
			<div class="optiontitle">Use HTML in item display?</div>
			<div class="optioninput"><input type="radio" name="html" value="y" <?php if ($html=='y') echo 'checked="checked"'?>/> yes <br>
				<input type="radio" name="html" value="n" <?php if ($html=='n') echo 'checked="checked"'?> /> no <br>
				<input type="radio" name="html" value="p" <?php if ($html=='p') echo 'checked="checked"'?> /> preserve paragraphs only
			</div>
			<div class="optionnote"></div>
		</div>
		<div class="option">
			<div class="optiontitle">UTF-8 Character Encoding</div>
			<div class="optioninput"><input type="checkbox" name="utf" value="y" <?php if ($utf=='y') echo 'checked="checked"'?> /></div>
			<div class="optionnote">
				use UTF-8 character encoding<br>
				Required for many non-western language web pages and also may help if you see strange characters replacing quotes in your output 
				(see <a href="https://feed2js.org/index.php?s=help#chars">help pages</a> for more information).
			</div>
		</div>	
		<div class="optionlast">
			<div class="optiontitle">Podcast enclosures</div>
			<div class="optioninput"><input type="checkbox" name="pc" value="y" <?php if ($pc=='y') echo 'checked="checked"'?> />
				<!-- input type="radio" name="pc" value="y" <?php if ($pc=='y') echo 'checked="checked"'?> /> yes<br>
				<input type="radio" name="pc" value="n" <?php if ($pc!='y') echo 'checked="checked"'?> /> no -->
			</div>
			<div class="optionnote">For RSS 2.0 feeds with enclosures, display link to media files</div>
		</div>
		
	</div><!-- end div this accordian item -->
</div>	<!-- end div accordian -->
	
</form>
</div> <!-- end div content -->

<?php
include_once('footer.php');
?>

</body>
</html>
