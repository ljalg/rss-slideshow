<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title>About building an RSS Slideshow</title>
	<META NAME="keywords" CONTENT="digital signage, rss, slideshow, display, feed, open source, free">
	<META NAME="description" CONTENT="Open source tool which displays RSS feed items in a slideshow fashion">
	<META HTTP-EQUIV="Content-Language" CONTENT="en-GB">
	
	<link rel="stylesheet" href="style/build.css" media="all" />
	
</head>
<body>
<div id="content">
<?php
include_once('header.php');
?>

<a name="about"><h1>About</h1></a>
<p>The intention of this is for any person or organization to be able to use the tool to display an RSS feed from within their organization or 
externally on a monitor in a lobby, dining area or anywhere people congregate.</p>

<p>This is my first attempt at an open source project and I'm actually pretty proud of it, but we will see how it goes.
I took <a href="http://feed2js.org/" target="_blank">feed2js</a> (which uses <a href="http://magpierss.sourceforge.net/" target="_blank">Magpie RSS</a>) 
and a <a href="http://malsup.com/jquery/cycle/" target="_blank">jQuery Cycle Plug-in</a>, 
combined them, made a few modifications and created this.</p>

<p>Feedback, suggestions or questions can be sent to <span class="reverse">gro.ezagla@siuol</span>


<a name="features"><h1>Features</h1></a>
		<ul>
		<li>Display RSS feed items in a slideshow type format</li>	
		<li>Several styles to choose from</li>
		<li>Decide transition options</li>
		<li>Set how long each item is to be displayed</li>
		<li>Adjustable transition time in and time out</li>
		<li>What content is displayed from the RSS feed; title, content, author, date</li>
		<li>Html content rendered or plain text</li>
		<li>Items can be displayed once or looped</li>
		<li>Item order; forward, reverse or randomize</li>
		<li>Pause slideshow on mouse hover</li>
		<li>Link to enclosures; audio, video or file</li>
		<li>Feed data is refreshed every hour</li>
		</ul>

<a name="fullscreen"><h1>Fullscreen</h1></a>
<strong>How do I show the slideshow in full screen?</strong>
<p>First change your browser to fullscreen, resize the text to get it to the desired size and refresh your browser page so the item is displayed.  
Each of these steps for different operating systems and browsers are listed below:
<table border="1px" cellpadding="3px">
<tr><th>Operating System</th><th>Browser</th><th>Fullscreen</th><th>Resize Text</th><th>Refresh</th></tr>
<tr><td>Windows</td><td>Internet Explorer</td><td>F11</td><td>Ctrl Mouse Scroll Wheel</td><td>F5</td></tr>
<tr><td>Windows</td><td>Firefox</td><td>F11</td><td>Ctrl Mouse Scroll Wheel</td><td>F5</td></tr>
<tr><td>Windows</td><td>Chrome</td><td>F11</td><td>Ctrl Mouse Scroll Wheel</td><td>F5</td></tr>
<tr><td>Windows</td><td>Safari</td><td>F11</td><td>Ctrl Mouse Scroll Wheel</td><td>F5</td></tr>
<tr><td>Mac</td><td>Safari</td><td><a href="https://discussions.apple.com/message/11654389#11654389" target="_blank">Kinda can't be done</a></td><td>cmd + and cmd -</td><td>CMD R</td></tr>
<tr><td>Mac</td><td>Firefox</td><td>shift cmd f</td><td>cmd + and cmd -</td><td>F5</td></tr>
<tr><td>Mac</td><td>Chrome</td><td>shift cmd f</td><td>cmd + and cmd -</td><td>cmd r</td></tr>
<tr><td>Linux</td><td>Firefox</td><td>F11</td><td>Ctrl Mouse Scroll Wheel</td><td>F5</td></tr>
<tr><td>Linux</td><td>Chrome</td><td>F11</td><td>Ctrl Mouse Scroll Wheel or Ctrl + and Ctrl -</td><td>F5</td></tr>
</table>
</p>


<a name="planned"><h1>Planned Features</h1></a>

<ul>
		<li>Done - <a href="frames_vertical.html">Multiple Feeds</a> - I used iframes to display more than one on a page. To display several feeds in a single list, I'd suggest an <a href="http://en.wikipedia.org/wiki/News_aggregator" target="_blank">RSS aggregator</a>.</li>
		<li>Done - Keep cache clear by deleting all cache files older than 1 day on every launch</li>
		<li>Allow user to specify their own css on a remote server or allow users to specify their own background image - easy one based on feedback.</li>
		<li>Automatic Browser Maximization or show in greybox</li>	
		<li>Incorporate the option to input your Zip code and get one of the items to display the local weather forecast.</li>
		<li>Configure feed update timing - how often does the script check for new items</li>
		</ul>

</div>

<?php
include_once('footer.php');
?>
</body>
</html>
