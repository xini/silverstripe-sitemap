<% cached 'sitemap', ID, List(SiteTree).max(LastEdited), List(SiteTree).count() %>
<% if SiteMapRootItems %>
	<ul class="sitemap">
		<% loop SiteMapRootItems %>
			<li class="item">
				<a href="$Link" >$Title</a>
				<br>$Content.FirstParagraph(0).NoHTML()
				<% if SiteMapChildren %>
					<ul>
						<% loop SiteMapChildren %>
							<li><a href="$Link" >$Title</a>
							<br>$Content.FirstParagraph(0).NoHTML()
								<% if SiteMapChildren %>
									<ul>
										<% loop SiteMapChildren %>
											<li><a href="$Link" >$Title</a>
											<br>$Content.FirstParagraph(0).NoHTML()
												<% if SiteMapChildren %>
													<ul>
														<% loop SiteMapChildren %>
															<li><a href="$Link" >$Title</a></li>
															<br>$Content.FirstParagraph(0).NoHTML()
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