# Sitemap User Guide

Tasks - [Return to Contents](index.md)

## Summary 

There is a Task at `dev/tasks/ShowInSitemapUpdateTask` which can Show or Hide all Pages in the Sitemap via the *Show in Sitemap?* Page setting.

The following query strings can be used in the task:

Name    | Value           | Description
------- | --------------- | -------------------------------------------------------------
enable  | *0* or *false*  | Check all unchecked Pages *Show in Sitemap* setting
enable  | *1* or *true*   | __*Default*__ Uncheck all checked Pages *Show in Sitemap* setting 
publish | *0* or *false*  | __*Default*__Save affected pages as Draft 
publish | *1* or *true*   | Publish the affected pages

Only the Pages that change the *Show in Sitemap?* setting will be updated/published.

## Examples

Check *Show in Sitemap* and publish pages

`dev/tasks/ShowInSitemapUpdateTask?enable=1&publish=1`

Uncheck *Show in Sitemap* and save drafts of pages

`dev/tasks/ShowInSitemapUpdateTask?enable=false`

