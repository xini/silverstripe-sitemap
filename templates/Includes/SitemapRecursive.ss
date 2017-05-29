<ul>
<% loop $Parent %>
	<li><a href="$Link" title="$Title">$MenuTitle</a>
	<% if SiteMapChildren %>
		<% include SitemapRecursive Parent=$SiteMapChildren %>
	<% end_if %>
	</li>
<% end_loop %>
</ul>