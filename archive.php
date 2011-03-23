<?php

include_once(dirname(__FILE__) . '/inc/includes.php');

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
        <title>Version Archive - <?php echo OyatelDistribution::getAppName(); ?></title>
		<link href="style.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
 
<div class="congrats">Version Archive<br /><?php echo OyatelDistribution::getAppName(); ?>.</div>

<?php

$versions = OyatelDistribution::getArchiveBuildNos();
foreach ($versions as $version) {

?>

<div class="step">
<a href="<?php echo OyatelDistribution::getManifestUrl($version); ?>">	
<table>
	<tr>
                <td class="instructions">Click to install <br /><?php echo OyatelDistribution::getAppName(); ?> build <?php echo $version; ?></td>
                <td width="24" class="arrow">&rarr;</td>
                <td width="57" class="imagelink">
					<img src="AppIcon.png" height="57" width="57" />
                </td>
        </tr></table></a>
</div>

<?php
}
?>

<div style="text-align: center; font-size: 0.6em;">
	<i>Latest version is <?php echo OyatelDistribution::getLatestBuildNo(); ?></i><br />
	<a href="index.php">Take me back home</a>
</div>

</body>
</html>