<?php

class OyatelDistributionBundleInfo {
	/**
	 * The app's bundle identifier (e.g. com.example.app)
	 * 
	 * @var string
	 */
	protected $bundleIdentifier;
	
	/**
	 * A 57 x 57-pixel PNG image that is displayed during download and installation. 
	 * 
	 * @var OyatelDistributionArtworkImage
	 */
	protected $displayImage;
	
	/**
	 * A 512 x 512-pixel PNG image that represents the app in iTunes.
	 * 
	 * @var OyatelDistributionArtworkImage
	 */
	protected $fullSizeImage;

	/**
	 * The title to display during the download
	 *
	 * @var string
	 */
	protected $title;
	
	/**
	 * Optional. Optional title in addition to application title
	 * displayed during download; typically company name 
	 *
	 * @var string
	 */
	protected $subtitle;
	
	public function setBundleIdentifier($id) {
		$this->bundleIdentifier = $id;
	}
	
	public function getBundleIdentifier() {
		return $this->bundleIdentifier;
	}
	
	public function setDisplayImage(OyatelDistributionArtworkImage $image) {
		$this->displayImage = $image;
	}
	
	public function getDisplayImage() {
		return $this->displayImage;
	}
	
	public function setFullSizeImage(OyatelDistributionArtworkImage $image) {
		$this->fullSizeImage = $image;
	}
	
	public function getFullSizeImage() {
		return $this->fullSizeImage;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setSubtitle($sub) {
		$this->subtitle = $sub;
	}
	
	public function getSubtitle() {
		return $this->subtitle;
	}
}
