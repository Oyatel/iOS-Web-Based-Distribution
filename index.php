<?php

include_once(dirname(__FILE__) . '/inc/includes.php');

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
	<title>Install <?php echo OyatelDistribution::getAppName(); ?></title>
	<link href="style.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
 
<div class="congrats">Congrats!<br />You've been invited to the <?php echo OyatelDistribution::getAppName(); ?> beta programme.</div>
 
<div class="step">
		<a href="<?php echo OyatelDistribution::getManifestUrl(OyatelDistribution::getLatestBuildNo()); ?>">	

        <table><tr>
                <td class="instructions">Click to install <br /><?php echo OyatelDistribution::getAppName(); ?></td>
                <td width="24" class="arrow">&rarr;</td>
                <td width="57" class="imagelink">
						<img src="AppIcon.png" height="57" width="57" />
                </td>
        </tr></table>

		</a>
		
</div>

<div style="text-align: center; font-size: 0.6em;">
	<i>Latest version is <?php echo OyatelDistribution::getLatestBuildNo(); ?></i><br />
	<a href="archive.php">Version Archive</a>
</div>

</body>
</html>