<?php

/**
 * Base implementation of the OyatelDistribution bundle.
 * Use OyatelDistribution class to override methods instead of
 * changing this one.
 */
abstract class OyatelDistributionAbstract {	
	/**
	 * Optional company name
	 * 
	 * @var string
	 */
	const COMPANY = 'Oyatel AS';
		
	/**
	 * The directory path on the server where builds reside.
	 * Used to fetch 
	 */
	const BUILDS_PATH = 'builds/';
	
	
	public static function getBaseUrl() {
		$scheme = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
		$host = $_SERVER['HTTP_HOST'];
		// var_dump($_SERVER);
		$absolute_uri = $_SERVER['SCRIPT_NAME'];
		if (substr($absolute_uri, -4) == '.php') {
			$absolute_uri = dirname($absolute_uri) . '/';
		}
		rtrim($absolute_uri, '/') . '/';
		
		return sprintf('%s://%s%s', $scheme, $host, $absolute_uri);
	}
	
	/**
	 * @return OyatelDistributionBundleInfo
	 */
	public static function getBundleInfo() {
		$displayImage = new OyatelDistributionArtworkImage();
		$displayImage->setNeedsShine(true);
		$displayImage->setImageUri(self::getBaseUrl() . 'AppIcon.png');
		
		$fullSizeImage = new OyatelDistributionArtworkImage();
		$fullSizeImage->setNeedsShine(true);
		$fullSizeImage->setImageUri(self::getBaseUrl() . 'iTunesArtwork');
		
		$bundleInfo = new OyatelDistributionBundleInfo();
		$bundleInfo->setBundleIdentifier(OyatelDistribution::getAppBundleIdentifier());
		$bundleInfo->setDisplayImage($displayImage);
		$bundleInfo->setFullSizeImage($fullSizeImage);
		$bundleInfo->setTitle(OyatelDistribution::getAppName());
		$bundleInfo->setSubtitle(OyatelDistribution::COMPANY);
		
		return $bundleInfo;
	}
	
	/**
	 * @param int $versionNo
	 * @return string
	 */
	public static function getPlistUrl($versionNo) {
		return OyatelDistribution::getBaseUrl() . 'Application.plist.php?v=' . $versionNo;
	}
	
	/**
	 * @param int $versionNo
	 * @return string
	 */
	public static function getManifestUrl($versionNo) {
		return 'itms-services://?action=download-manifest&amp;url=' . self::getPlistEncodedUrl($versionNo);
	}
	
	/**
	 * @return int
	 */
	public static function getLatestBuildNo() {
		$latest_version = file_get_contents(OyatelDistribution::BUILDS_PATH . 'latest');
		return intval($latest_version);
	}
	
	public static function getBuildDownloadUrl($versionNo) {
		return OyatelDistribution::getBaseUrl() . 'builds/' . OyatelDistribution::getBinaryAppFilename($versionNo);
	}
	
	/**
	 * @return int[] Arrays of valid build numbers
	 */
	public static function getArchiveBuildNos() {
		$latest_version = file_get_contents(self::BUILDS_PATH . 'latest');
		$dir = dir(self::BUILDS_PATH);

		$versions = array();
		while ($file = $dir->read()) {
			$matches = null;
						
			if (preg_match(OyatelDistribution::getBuildNumberRegex(), $file, $matches) > 0) {
				$versions[] = $matches[1];
			}
		}

		arsort($versions);
		
		return $versions;
	}

	/**
	 * @return string
	 */	
	public abstract static function getAppName();
	
	/**
	 * @return string
	 */	
	public abstract static function getAppBundleIdentifier();	
	
	/**
	 * Regex used to match valid builds and fetch build number
	 * from the filename. 
	 *
	 * @return string regex
	 */
	public abstract static function getBuildNumberRegex();
	
	/**
	 * Filename (basename) to build the link to 
	 * downloadable versions based on build number.
	 * 
	 * @return string
	 */
	public abstract static function getBinaryAppFilename($versionNo);
	
	/**
	 * @param int $versionNo
	 * @return string
	 */	
	protected static function getPlistEncodedUrl($versionNo) {
		return OyatelDistribution::getBaseUrl() . 'Application.plist.php' . urlencode('?v=' . $versionNo);
	}
}
