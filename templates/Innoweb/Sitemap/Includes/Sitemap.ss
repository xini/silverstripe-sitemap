<% cached 'sitemap', $SitemapCacheKey %>
    <% if $Top.SitemapRootItems %>
		<ul class="sitemap">
		    <% loop $Top.SitemapRootItems %>
		        <li class="sitemap-item">
		        	<a href="$Link"><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></a>
		            <% if $SitemapChildren %>
		                <% include Innoweb/Sitemap/SitemapRecursive Parent=$SitemapChildren %>
		            <% end_if %>
		        </li>
		    <% end_loop %>
		</ul>
    <% end_if %>
<% end_cached %>
