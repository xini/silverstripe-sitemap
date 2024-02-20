# SilverStripe Sitemap

[![Version](http://img.shields.io/packagist/v/innoweb/silverstripe-sitemap.svg?style=flat-square)](https://packagist.org/packages/innoweb/silverstripe-sitemap)
[![License](http://img.shields.io/packagist/l/innoweb/silverstripe-sitemap.svg?style=flat-square)](license.md)

## Overview

Adds a page type that automatically builds a sitemap from the view tree. 

The module adds a new checkbox to the Settings tab of each page, where visibility of the page in the sitemap can be controlled.

The module supports the [multisites](https://github.com/symbiote/silverstripe-multisites) and [configured-multisites](https://github.com/fromholdio/silverstripe-configured-multisites) modules, and by default shows all pages from the current site.

## Requirements

* SilverStripe CMS 5.x

Note: this version is compatible with SilverStripe 5.
For Silverstripe 4, please see the [2.x release line](https://github.com/xini/silverstripe-sitemap/tree/2).
For SilverStripe 3, please see the [1.x release line](https://github.com/xini/silverstripe-sitemap/tree/1).

## Installation

Install the module using composer:
```
composer require innoweb/silverstripe-sitemap dev-master
```

Then run dev/build.

## License

BSD 3-Clause License, see [License](license.md)
