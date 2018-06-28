<?php

namespace Innoweb\Sitemap\Extensions;

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
        $fields->addFieldToTab(
            'Root.Settings',
            CheckboxField::create(
                'ShowInSitemap',
                _t('SitemapDecorator.SHOWINSITEMAP', 'Show in sitemap?')
            ),
            'ShowInSearch'
        );

    }

    public function SitemapChildren()
    {
        $children = $this->owner->AllChildren()
            ->filter([
                'ShowInSitemap' => '1'
            ]);
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

