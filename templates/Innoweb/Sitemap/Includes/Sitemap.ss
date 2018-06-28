<% cached 'sitemap', $SitemapCacheKey %>
    <% if $Top.SitemapRootItems %>
        <% include Innoweb/Sitemap/SitemapRecursive Parent=$Top.SitemapRootItems %>
    <% end_if %>
<% end_cached %>
