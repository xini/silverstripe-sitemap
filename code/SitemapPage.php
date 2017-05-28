<?php
 
class SitemapPage extends Page {
	
	private static $db = array(
		'SiteMapTemplate' => 'Varchar',
	);
		
	public function populateDefaults() {
		$this->SiteMapTemplate = ($this->config()->default_template ? $this->config()->default_template : 'SiteMapDefault');
		parent::populateDefaults();
	}
	
	private static $defaults = array(
		'ShowInMenus' => false,
		'ShowInSearch' => false,
		'ShowInSitemap' => false,
		'Priority' => '1.0',
		'Content' => '$Sitemap',
	);
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab("Root.Main",
			DropdownField::create('SiteMapTemplate', _t("SitemapPage.SITEMAPTEMPLATE", 'Sitemap Template'), $this->getTemplates()),
			"Content"
		);
		
		return $fields;
	}
		
	public function getTemplates()
	{
		$templates = array();
		$finder = new SS_FileFinder();
		$finder->setOption('name_regex', '/^.*\.ss$/');
		$found = $finder->find(BASE_PATH . '/sitemap/templates/sitemap');

		foreach ($found as $key => $value) {
            $template = pathinfo($value);
            $templates[$template['filename']] = $template['filename'];
        }
        return $templates;
	}	
		
	public function SitemapRootItems() {
		$baseClass = ClassInfo::baseDataClass($this->owner->class);
		if (class_exists('Multisites')) {
			$parent = $this->SiteID;
		} else {
			$parent = 0;
		}
		$items = DataObject::get($baseClass, "\"{$baseClass}\".\"ParentID\" = {$parent} AND \"{$baseClass}\".\"ShowInSitemap\" = 1");
		return $items;
	}
	
}
 
class SitemapPage_Controller extends Page_Controller {
		
    public function index()
    {
        if ($this->Content) {
            $hasLocation = stristr($this->Content, '$Sitemap');
            if ($hasLocation) {
                $content = preg_replace('/(<p[^>]*>)?\\$Sitemap(<\\/p>)?/i', $this->data()->renderWith($this->SiteMapTemplate), $this->Content);
                return array(
                    'Content' => DBField::create_field('HTMLText', $content),
                    'Form' => '',
                );
            }
        }

        return array(
            'Content' => DBField::create_field('HTMLText', $this->Content),
            'Form' => $this->data()->renderWith($this->SiteMapTemplate),
        );
    }
	
}
 
