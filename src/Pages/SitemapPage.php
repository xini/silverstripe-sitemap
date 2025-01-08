<?php

namespace Innoweb\Sitemap\Pages;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Manifest\ModuleLoader;

class SitemapPage extends \Page {

    private static $singular_name = 'Sitemap Page';
    private static $plural_name = 'Sitemap Pages';
    private static $description = 'Displays a sitemap with all pages marked for display in the sitemap.';

    private static $table_name = 'SitemapPage';

    private static $icon  = 'innoweb/silverstripe-sitemap: client/images/treeicons/sitemap.gif';

	private static $excluded_pagetypes = [];

    private static $defaults = [
        'ShowInMenus'   => false,
        'ShowInSearch'  => true,
        'ShowInSitemap' => false,
        'Priority'      => '1.0',
    ];

    public function SitemapRootItems()
    {
        $manifest = ModuleLoader::inst()->getManifest();
        $isMultisites = $manifest->moduleExists('symbiote/silverstripe-multisites')
            || $manifest->moduleExists('fromholdio/silverstripe-configured-multisites');

        if ($isMultisites) {
            $parent = $this->SiteID;
        } else {
            $parent = 0;
        }
        $filter = [
            'ParentID'       =>  $parent,
            'ShowInSitemap'  =>  1,
        ];
        if (count(self::config()->get('excluded_pagetypes'))) {
            $filter['ClassName:not'] = self::config()->get('excluded_pagetypes');
        }
        $items = SiteTree::get()->filter($filter);
        return $items;
    }

}
