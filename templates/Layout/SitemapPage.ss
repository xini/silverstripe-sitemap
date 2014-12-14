<div class="typography">
	<% cached 'page-layout', LastEdited, ID %>
		<% if $BackLink %><% include BackLink BackLink=$BackLink %><% end_if %>
		<h1>$Title</h1>
		$Content
	<% end_cached %>
	<% include SiteMap %>
	$Form
	$PageComments
</div>