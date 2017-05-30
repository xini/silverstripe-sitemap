# SilverStripe Sitemap Module

[![Version](http://img.shields.io/packagist/v/innoweb/silverstripe-sitemap.svg?style=flat-square)](https://packagist.org/packages/innoweb/silverstripe-sitemap)
[![License](http://img.shields.io/packagist/l/innoweb/silverstripe-sitemap.svg?style=flat-square)](license.md)

## Overview

- Adds a page type that automatically builds a sitemap from the view tree based on templates.
- The module adds a new checkbox to the Settings tab of each page, where visibility of the page in the sitemap can be controlled.
- Silverstripe Task to change Page Sitemap visibility.
- The module supports the [multisites module](https://github.com/silverstripe-australia/silverstripe-multisites) and by default shows all pages from the current site.

## Requirements

* SilverStripe CMS ~3.2

## Installation

Install the module using composer:
```sh
$ composer require innoweb/silverstripe-sitemap dev-master
```
or download or git clone the module into a ‘sitemap’ directory in your webroot.

Then run `dev/build`.

## Documentation

- [Installation](docs/en/installation.md)
- [User Guide](docs/en/userguide/index.md)

## License

BSD 3-Clause License, see [License](license.md)

Copyright Florian Thoma

Contributions by Stewart Cossey