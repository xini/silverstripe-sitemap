<% cached 'sitemap', ID, List(SiteTree).max(LastEdited), List(SiteTree).count() %>
    <% if $Top.SiteMapRootItems %>
        <ul class="sitemap">
            <% loop $Top.SiteMapRootItems %>
                <li class="item">
                    <h2><a href="$Link" title="$Title">$MenuTitle</a></h2>
                    <% if $SiteMapChildren %>
                        <% include SitemapRecursive Parent=$SiteMapChildren %>
                    <% end_if %>
                </li>
            <% end_loop %>
        </ul>
    <% end_if %>
<% end_cached %>
