# Silverstripe Sitemap Module User Guide

Tasks - [Return to Contents](index.md)

## Summary 

There is a Task at `dev/tasks/ShowInSitemapUpdateTask` which can Show or Hide all Pages in the Sitemap *Show in Sitemap?*.

The following query strings can be used in the task:

Name     | Value                      | Description
-------- | -------------------------- | -------------------------------------------------------------
enable   | 0 *or* false               | Check all unchecked Pages *Show in Sitemap* setting
enable   | 1 *or* true **_Default_**  | Uncheck all checked Pages *Show in Sitemap* setting 
publish  | 0 *or* false **_Default_** | Save affected pages as Draft 
publish  | 1 *or* true                | Publish the affected pages

## Examples

Check *Show in Sitemap* and publish affected pages
`dev/tasks/ShowInSitemapUpdateTask?enable=1&publish=1`

Uncheck *Show in Sitemap* and publi
`dev/tasks/ShowInSitemapUpdateTask?enable=false`