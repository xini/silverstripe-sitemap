<?php

namespace Innoweb\Sitemap\Pages;

use SilverStripe\CMS\Model\SiteTree;

class SitemapPage extends \Page {

    private static $singular_name = 'Sitemap Page';
    private static $plural_name = 'Sitemap Pages';
    private static $description = 'Displays a sitemap with all pages marked for display in the sitemap.';

    private static $table_name = 'SitemapPage';

    private static $icon  = 'innoweb/silverstripe-sitemap: client/images/treeicons/sitemap.gif';

    private static $defaults = [
        'ShowInMenus'   => false,
        'ShowInSearch'  => false,
        'ShowInSitemap' => false,
        'Priority'      => '1.0',
    ];

    public function SitemapRootItems()
    {
        if (class_exists('Symbiote\Multisites\Multisites')) {
            $parent = $this->SiteID;
        } else {
            $parent = 0;
        }
        $items = SiteTree::get()->filter([
            'ParentID'      =>  $parent,
            'ShowInSitemap' =>  1
        ]);
        return $items;
    }

}
