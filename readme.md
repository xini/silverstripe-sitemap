# SilverStripe Sitemap Module

[![Version](http://img.shields.io/packagist/v/innoweb/silverstripe-sitemap.svg?style=flat-square)](https://packagist.org/packages/innoweb/silverstripe-sitemap)
[![License](http://img.shields.io/packagist/l/innoweb/silverstripe-sitemap.svg?style=flat-square)](license.md)

## Overview

Adds a page type that automatically builds a sitemap from the view tree based on templates.

The module adds a new checkbox to the Settings tab of each page, where visibility of the page in the sitemap can be controlled.

The module supports the [multisites module](https://github.com/silverstripe-australia/silverstripe-multisites) and by default shows all pages from the current site.

## Requirements

* SilverStripe CMS ~3.2

## Installation

Install the module using composer:
```
composer require innoweb/silverstripe-sitemap dev-master
```
or download or git clone the module into a ‘sitemap’ directory in your webroot.

Then run `dev/build`.

## Sitemap Pages

### Sitemap Output

By default the Sitemap will render to the `$Sitemap` variable in the Content field. If the variable is ommitted then the Sitemap will render to the `$Form` variable.

### Templates

Sitemap templates are stored in the `/sitemap/templates/sitemap` folder. Templates only apply to Sitemap Pages.

You can specify the default template to select on the SitemapPage by adding the following to your `app.yml` file.

```YAML
SitemapPage:
  default_template: 'SitemapContentPreview'
```

If the `default_template` is not specified then the `SitemapDefault` template will be used.

## Templates Syntax

The sitemap can additionally be rendered to a Silverstripe Template by either `include Sitemap` or `include SitemapRecursive`.

The following syntax will display the entire Sitemap (and cache it):

```php
<% include Sitemap %>
```

To include pages from a specific Page node based on the Page Link onwards use the following syntax:

```php
<% include SitemapRecursive Parent=$Page('PageLink') %>
```

To include pages from a specific Page node based on the Pages children use the following syntax:

```php
<% include SitemapRecursive Parent=$Page('PageLink').SiteMapChildren %>
```

## Silverstripe Tasks

There is a Task at `dev/tasks/ShowInSitemapUpdateTask` which can Show or Hide all Pages in the Sitemap (Show in Sitemap?).

The following query strings can be used in the task:

Name     | Value    | Description
-------- | -------- | -------------------------------------------------------------
enable   | 0, false | Check all unchecked Pages "Show in Sitemap" setting
         | 1, true  | Uncheck all checked Pages "Show in Sitemap" setting *Default*
publish  | 0, false | Save affected pages as Draft *Default*
         | 1, true  | Publish the affected pages

## License

BSD 3-Clause License, see [License](license.md)

Copyright Florian Thoma

Contributions by Stewart Cossey



