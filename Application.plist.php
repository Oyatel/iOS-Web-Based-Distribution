<?php

require_once(dirname(__FILE__) . '/inc/includes.php');

$versionNo = $_GET['v'];
$bundleInfo = OyatelDistribution::getBundleInfo();
$downloadUrl = OyatelDistribution::getBuildDownloadUrl($versionNo);

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>items</key>
	<array>
		<dict>
			<key>assets</key>
			<array>
				<dict>
					<key>kind</key>
					<string>software-package</string>
					<key>url</key>
					<string><?php echo $downloadUrl; ?></string>
				</dict>
				<dict>
					<key>kind</key>
					<string>full-size-image</string>
					<key>needs-shine</key>
					<?php 
					echo $bundleInfo->getFullSizeImage()->getNeedsShine() ?  '<true/>' : '<false/>';
					?>
					
					<key>url</key>
					<string><?php echo $bundleInfo->getFullSizeImage()->getImageUri(); ?></string>
				</dict>
				<dict>
					<key>kind</key>
					<string>display-image</string>
					<key>needs-shine</key>
					<?php 
					echo $bundleInfo->getDisplayImage()->getNeedsShine() ? '<true/>' : '<false/>';
					?>
					
					<key>url</key>
					<string><?php echo $bundleInfo->getDisplayImage()->getImageUri(); ?></string>
				</dict>			
			
			</array>
			<key>metadata</key>
			<dict>
				<key>bundle-identifier</key>
				<string><?php echo $bundleInfo->getBundleIdentifier(); ?></string>
				<key>bundle-version</key>
				<string><?php echo $versionNo; ?></string>
				<key>kind</key>
				<string>software</string>
				<key>title</key>
				<string><?php echo $bundleInfo->getTitle(); ?></string>
				<?php
				if ($bundleInfo->getSubtitle()) {
					?>
		    		<key>subtitle</key>
		    		<string><?php echo $bundleInfo->getSubtitle(); ?></string>
					<?php
				}
				?>
			</dict>
		</dict>
	</array>
</dict>
</plist>
