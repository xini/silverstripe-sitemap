# Sitemap User Guide

Includes - [Return to Contents](index.md)

## Summary

The sitemap can be rendered in a Silverstripe Template by including the `Sitemap` or `SitemapRecursive` templates.

### Sitemap

This include will render the entire SiteTree including any Multisites you have configured. Also cache's the response.

### SitemapRecursive

This include supports the following arguments:

Name   | Type                 | Description
------ | -------------------- | -----------
Parent | *SiteTree* or *Page* | Render the Sitemap for this Type and its descendants.

## Examples

The following syntax will display the entire Sitemap (and cache it):

```php
<% include Sitemap %>
```

To include pages from a specific Page node based on the Page Link onwards use the following syntax:

```php
<% include SitemapRecursive Parent=$Page('home/childpage') %>
```

To include pages from a specific Page node based on the Page descendants use the following syntax:

```php
<% include SitemapRecursive Parent=$Page('home/childpage').SiteMapChildren %>
```