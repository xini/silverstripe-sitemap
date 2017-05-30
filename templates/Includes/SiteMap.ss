<% cached 'sitemap', ID, List(SiteTree).max(LastEdited), List(SiteTree).count() %>
<% if $Top.SiteMapRootItems %>
	<% include SitemapRecursive Parent=$Top.SiteMapRootItems %>
<% end_if %>
<% end_cached %>