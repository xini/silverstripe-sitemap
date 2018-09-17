<?php

namespace Innoweb\Sitemap\Extensions;

use Innoweb\Sitemap\Pages\SitemapPage;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\Forms\CheckboxField;

class SitemapSiteTreeExtension extends SiteTreeExtension {

    private static $db = [
        'ShowInSitemap' => 'Boolean'
    ];

    private static $defaults = [
        'ShowInSitemap' => true,
    ];

    public function updateSettingsFields(&$fields)
    {
        if (!in_array($this->owner->ClassName, SitemapPage::config()->get('excluded_pagetypes'))) {
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
        $children = $this->owner->AllChildren()->filter($filter);
        return $children;
    }

    public function SitemapCacheKey()
    {
        $fragments = [
            $this->owner->ID,
            SiteTree::get()->max('LastEdited'),
            SiteTree::get()->count()
        ];
        return implode('-_-', $fragments);
    }

}

