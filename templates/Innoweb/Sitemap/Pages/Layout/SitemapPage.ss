<div class="page__content">
    <h1 class="page__title">$Title</h1>
    $Content
    $ElementalArea
    <% include Innoweb/Sitemap/Sitemap %>
    $Form
</div>
<% if $PageLevel == 1 && $Children %>
    <% include LevelOneSidebar %>
<% else_if $PageLevel > 1 && $Menu($PageLevel).count > 1 %>
    <% include Sidebar %>
<% end_if %>
