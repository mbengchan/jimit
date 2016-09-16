<?php defined('SYSPATH') or die('No direct script access');
/**
* 
*/
class Model_Partner extends ORM
{
	
	public function getThumb()
	{
		if (empty($this->thumb)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/images/partners/thumb/".$this->thumb;
		}
	}

	public function getPicture()
	{
		if (empty($this->photo)) {
			return "http://placehold.it/100x100";
		} else {
			return url::base()."media/images/partners/".$this->photo;
		}
	}
}