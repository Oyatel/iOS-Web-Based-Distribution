<?php

class OyatelDistributionArtworkImage {
	/**
	 * Specify the image’s fully qualified URL
	 * 
	 * @var string
	 */
	protected $imageUri;
	
	/**
	 * Indicates if icon needs shine effect applied
	 *
	 * @var boolean
	 */
	protected $needsShine = true;
	
	public function setImageUri($uri) {
		$this->imageUri = $uri;
	}
	
	public function getImageUri() {
		return $this->imageUri;
	}
	public function setNeedsShine($bool) {
		$this->needsShine = $bool;
	}
	
	public function getNeedsShine() {
		return $this->needsShine;
	}
}