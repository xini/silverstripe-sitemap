<?php

class ShowInSitemapUpdateTask extends BuildTask {
	
	protected $title = 'Show or Hide All Pages In Sitemap';
	
	protected $description = 'Show or Hide In Sitemap for all pages. Can also Publish those pages. Does not affect Sitemap Pages or Error Pages';
	
	protected $enabled = true;
	
	function run($request) {
		$publish = false;
		$enabler = true;
		if ($request->requestVar('publish') == "true" || $request->requestVar('publish') == "1") {
			$publish = true;
		}
		if ($request->requestVar('enable') == "false" || $request->requestVar('enable') == "0") {
			$enabler = false;
		}
		$this->enableShowInSitemap($enabler, $publish);
	}
	
	function enableShowInSitemap($enabler, $publish) {
		$taskfunctions = '<strong>';
		if (!$enabler) {
			$ShowInSitemapFilter = 0;
			$taskfunctions .= 'Hiding All Pages In Sitemap...';
		} else {
			$ShowInSitemapFilter = 1;
			$taskfunctions .= 'Showing All Pages In Sitemap...';
		}
		echo $taskfunctions . "</strong><br>";
		
		$Pages = SiteTree::get()->exclude('ClassName', array('SitemapPage','ErrorPage'))->exclude('ShowInSitemap', $ShowInSitemapFilter);
		
		$updatecount = 0;
		foreach($Pages as $TreeItem) {
			echo "Updating " . $TreeItem->ClassName . ": " . $TreeItem->Link() . "<br>";
			$TreeItem->ShowInSitemap = $ShowInSitemapFilter;
			$TreeItem->write();
			if ($publish) $TreeItem->doPublish();
			$updatecount++;
		}
		
		if(!$updatecount) {
			echo "<strong>There are no pages to update.</strong><br>";
		} else {
			if ($publish) {
				echo "<strong>Published " . $updatecount . " Pages.</strong>";
			} else {
				echo "<strong>Updated " . $updatecount . " Pages.</strong>";
			}
		}
		
	}
}