# SilverStripe Social Metadata

[![Version](http://img.shields.io/packagist/v/innoweb/silverstripe-sitemap.svg?style=flat-square)](https://packagist.org/packages/innoweb/silverstripe-sitemap)
[![License](http://img.shields.io/packagist/l/innoweb/silverstripe-sitemap.svg?style=flat-square)](license.md)

## Overview

Adds a page type that automatically builds a sitemap from the view tree based on templates.

The module adds a new checkbox to the Settings tab of each page, where visibility of the page in the sitemap can be controlled.

The module supports the [multisites module] (https://github.com/silverstripe-australia/silverstripe-multisites) and by default shows all pages from the current site.

## Requirements

* SilverStripe CMS ~3.2

## Installation

Install the module using composer:
```
composer require innoweb/silverstripe-sitemap dev-master
```
or download or git clone the module into a ‘sitemap’ directory in your webroot.

Then run `dev/build`.

## Configuration

Sitemap templates are stored in `/sitemap/templates/sitemap`.

You can specify the default template to select on the SitemapPage or the default `SitemapDefault` will be selected.

```YAML
SitemapPage:
  default_template: 'SitemapContentPreview'
```

## License

BSD 3-Clause License, see [License](license.md)
