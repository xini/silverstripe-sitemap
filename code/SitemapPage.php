<?php
 
class SitemapPage extends Page {
	
	private static $defaults = array(
		'ShowInMenus' => false,
		'ShowInSearch' => false,
		'ShowInSitemap' => false,
		'Priority' => '1.0',
	);
		
	public function SitemapRootItems() {
		$baseClass = ClassInfo::baseDataClass($this->owner->class);
		$items = DataObject::get($baseClass, "\"{$baseClass}\".\"ParentID\" = 0 AND \"{$baseClass}\".\"ShowInSitemap\" = 1");
		return $items;
	}
	
	public function canCreate($member = null) {
		$canCreate = parent::canCreate($member);
		$doesNotExist = (SitemapPage::get()->Count() < 1);
		return ($canCreate && $doesNotExist);
	}
	
}
 
class SitemapPage_Controller extends Page_Controller {
 	
}
 
