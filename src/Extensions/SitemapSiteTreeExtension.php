<?php

namespace Innoweb\Sitemap\Extensions;

use Innoweb\Sitemap\Pages\SitemapPage;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\CheckboxField;

class SitemapSiteTreeExtension extends Extension {

    private static $db = [
        'ShowInSitemap' => 'Boolean'
    ];

    private static $defaults = [
        'ShowInSitemap' => true,
    ];

    public function updateCMSFields(&$fields)
    {
        $fields->removeByName('ShowInSitemap');
    }

    public function updateSettingsFields(&$fields)
    {
        if (!in_array($this->getOwner()->ClassName, SitemapPage::config()->get('excluded_pagetypes'))) {
            $fields->addFieldToTab(
                'Root.Settings',
                CheckboxField::create(
                    'ShowInSitemap',
                    _t('SitemapDecorator.SHOWINSITEMAP', 'Show in sitemap?')
                ),
                'ShowInSearch'
            );
        }
    }

    public function SitemapChildren()
    {
        $filter = [
            'ShowInSitemap' => '1',
        ];
        if (count(SitemapPage::config()->get('excluded_pagetypes'))) {
            $filter['ClassName:not'] = SitemapPage::config()->get('excluded_pagetypes');
        }
        $children = $this->getOwner()->AllChildren()->filter($filter);
        return $children;
    }

    public function SitemapCacheKey()
    {
        $fragments = [
            $this->getOwner()->ID,
            SiteTree::get()->max('LastEdited'),
            SiteTree::get()->count()
        ];
        return implode('-_-', $fragments);
    }

}
