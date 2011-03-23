<?php

/**
 * Code overrides goes here...
 */
class OyatelDistribution extends OyatelDistributionAbstract {
	/**
	 * @return string
	 */	
	public static function getAppName() {
		return 'MyApp';
	}
	
	/**
	 * @return string
	 */	
	public static function getAppBundleIdentifier() {
		return 'com.example.app';
	}
	
	/**
	 * Regex used to match valid builds and fetch build number
	 * from the filename. 
	 * (.*?) is the Build Number in this case
	 *
	 * @return string regex
	 */
	public static function getBuildNumberRegex() {
		return '/Oyatel_b(.*?)\.ipa/';
	}
	
	/**
	 * Filename (basename) to build the link to 
	 * downloadable versions based on build number.
	 * 
	 * @return string
	 */
	public static function getBinaryAppFilename($versionNo) {
		return sprintf('Oyatel_b%d.ipa', $versionNo);
	}
}
