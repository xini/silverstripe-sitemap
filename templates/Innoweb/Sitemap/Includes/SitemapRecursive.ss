<ul>
    <% loop $Parent %>
        <li><a href="$Link" title="$Title">$MenuTitle</a>
            <% if $SitemapChildren %>
                <% include Innoweb/Sitemap/SitemapRecursive Parent=$SitemapChildren %>
            <% end_if %>
        </li>
    <% end_loop %>
</ul>
