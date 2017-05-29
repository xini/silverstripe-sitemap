# Sitemap User Guide

Includes - [Return to Contents](index.md)

## Summary

The sitemap can be rendered in a Silverstripe Template by including the `Sitemap` or `SitemapRecursive` templates.

The `SitemapRecursive` include supports the following arguments

Name   | Description
------ | -----------
Parent | *SiteTree* or *Page*. Render the Sitemap for this item and its children.

## Examples

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