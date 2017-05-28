<% cached 'sitemap', ID, List(SiteTree).max(LastEdited), List(SiteTree).count() %>
<% if SiteMapRootItems %>
	<ul class="sitemap">
		<% loop SiteMapRootItems %>
			<li class="item">
				<h2><a href="$Link" title="$Title">$MenuTitle</a></h2>
				<% if SiteMapChildren %>
					<ul>
						<% loop SiteMapChildren %>
							<li><a href="$Link" title="$Title">$MenuTitle</a>
								<% if SiteMapChildren %>
									<ul>
										<% loop SiteMapChildren %>
											<li><a href="$Link" title="$Title">$MenuTitle</a>
												<% if SiteMapChildren %>
													<ul>
														<% loop SiteMapChildren %>
															<li><a href="$Link" title="$Title">$MenuTitle</a></li>
														<% end_loop %>
													</ul>
												<% end_if %>
											</li>
										<% end_loop %>
									</ul>
								<% end_if %>
							</li>
						<% end_loop %>
					</ul>
				<% end_if %>
			</li>
		<% end_loop %>
	</ul>
<% end_if %>
<% end_cached %>