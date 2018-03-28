<?php

/* ----------------- Default Feed Values ----------------- */
// URL of feed
$def_src = '';

// display channel information?
$def_chan = 'y';

// number of feed items to display, 0 is all
$def_num = '0';

// what content to display for each item
$def_desc = '1';

// should item author be displayed?
$def_auth = 'n';
$alt_auth = 'y'; //should be opposite of default above

// should item date be displayed?
$def_date = 'n';

// time zone displayed
$def_tz = 'feed';

// target: where should followed link open?
$def_targ = 'n';

// should html be displayed?
$def_html = 'y';

// should text be displayed as utf8?
$def_utf = 'y';

// deprecaited - allows several feeds with different styles on same page
$def_rss_box_id = '';

// show media enclosures?
$def_pc = 'n';

/* ----------------- Default slideshow Values ----------------- */

// transitions
$def_fx = 'fade';

// time (in miliseconds) that each item is displayed
$def_to = '4000';

// time (in miliseconds) that it takes each item to transition in
$def_si = '1000';

// time (in miliseconds) that it takes each item to transition out
$def_so = '1000';

// display feed items in reverse order - backwards
$def_bward = false;
$alt_bward = true; //set to opposite of $def_bward

// only show each item once, start from beginning after finishing the last item
$def_nowrap = false;
$alt_nowrap = true; //set to opposite of $def_nowrap

// pause slideshow on mouse hover
$def_pause = false;
$alt_pause = true; //set to opposite of $def_pause

// randomize transition effects if several are specified
$def_random = false;
$alt_random = true; //set to opposite of $def_random

// view items in random order
$def_reffect = false;
$alt_reffect = true; //set to opposite of $def_reffect

/* ----------------- Default other Values ----------------- */

// which css to use?
$def_css = 'black';



/* -------------------------------- the settings below should not be modified -------------------------------- */

/* ----------------- get passed feed values ----------------- */

$src = (isset($_GET['src'])) ? $_GET['src'] : $def_src;
$chan = (isset($_GET['chan'])) ? $_GET['chan'] : $def_chan;
$num = (isset($_GET['num'])) ? $_GET['num'] : $def_num;
$desc = (isset($_GET['desc'])) ? $_GET['desc'] : $def_desc;
$auth = (isset($_GET['auth'])) ? $alt_auth : $def_auth;
$date = (isset($_GET['date'])) ? $_GET['date'] : $def_date;
$tz = (isset($_GET['tz'])) ? $_GET['tz'] : $def_tz;
$targ = (isset($_GET['targ'])) ? $_GET['targ'] : $def_targ;
$html = (isset($_GET['html'])) ? $_GET['html'] : $def_html;
$utf = (isset($_GET['utf'])) ? $_GET['utf'] : $def_utf;
$rss_box_id = (isset($_GET['rss_box_id'])) ? $_GET['rss_box_id'] : $def_rss_box_id;
$pc = (isset($_GET['pc'])) ? $_GET['pc'] : $def_pc;

// test for malicious use of script tages
if (strpos($src, '<script>')) {
	$src = preg_replace("/(\<script)(.*?)(script>)/si", "SCRIPT DELETED", "$src");
	die("Warning! Attempt to inject javascript detected. Aborted and tracking log updated.");
}

/*----------------- build parameter string for the feed2js url ----------------- */
$options = '';	
if ($chan != $def_chan) $options .= "&chan=$chan";
if ($num != $def_num) $options .= "&num=$num";
if ($desc != $def_desc) $options .= "&desc=$desc";
if ($auth != $def_auth) $options .= "&auth=$auth";
if ($date != $def_date) $options .= "&date=$date";
if ($tz != $def_tz) $options .= "&tz=$tz";
if ($targ != $def_targ) $options .= "&targ=$targ";
if ($html != $def_html) $html_options = "&html=$html";
if ($utf != $def_utf) $options .= "&utf=$utf";
if ($rss_box_id != $def_rss_box_id) $options .= "&css=$rss_box_id";
if ($pc != $def_pc) $options .= "&pc=$pc";

$rss_str = "feed2js.php?src=" . urlencode($src) . $options . $html_options;
// debugging echo($rss_str);

$noscript_rss_str = "feed2js.php?src=" . urlencode($src) . $options .  '&html=y';



/* ----------------- get passed slideshow values ----------------- */

$fx = (isset($_GET['fx'])) ? $_GET['fx'] : $def_fx;
$to = (isset($_GET['to'])) ? $_GET['to'] : $def_to;
$si = (isset($_GET['si'])) ? $_GET['si'] : $def_si;
$so = (isset($_GET['so'])) ? $_GET['so'] : $def_so;
$bward = (isset($_GET['bward'])) ? $alt_bward : $def_bward;
$nowrap = (isset($_GET['nowrap'])) ? $alt_nowrap : $def_nowrap;
$pause = (isset($_GET['pause'])) ? $alt_pause : $def_pause;
$random = (isset($_GET['random'])) ? $alt_random : $def_random;
$reffects = (isset($_GET['reffects'])) ? $alt_reffects : $def_reffects;


// build parameter string for the slideshow
// always display the fade so the string does not start with a comma
$ssoptions = "fx: '$fx'";
if ($to != $def_to) $ssoptions .= ",timeout: $to";
if ($si != $def_si) $ssoptions .= ",speedIn: $si";
if ($so != $def_so) $ssoptions .= ",speedOut: $so";
if ($def_bward) $ssoptions .= ",backwards: $bward";
if ($def_nowrap) $ssoptions .= ",nowrap: $nowrap";
if ($def_pause) $ssoptions .= ",pause: $pause";
if ($def_random) $ssoptions .= ",random: $random";
if ($def_reffects) $ssoptions .= ",randomizeEffects: $reffects";

//output is the variable $ssoptions

/* ----------------- get other passed values ----------------- */

$css = (isset($_GET['css'])) ? $_GET['css'] : $def_css;

// define css file based on passed value
switch ($css) {
	case "black": $css="style/rssslideshow_black.css"; break;
	case "white": $css="style/rssslideshow_white.css"; break;
	default: $css="style/rssslideshow_black.css"; break;
	}
