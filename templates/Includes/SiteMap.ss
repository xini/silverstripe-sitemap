<% cached 'sitemap', CurrentMember.ID, List(Page).max(LastEdited) %>
<% if SiteMapRootItems %>
	<ul class="listing sitemap">
		<% loop SiteMapRootItems %>
			<li>
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