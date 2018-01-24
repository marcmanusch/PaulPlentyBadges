{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_new'}
	{if $sArticle.plenty_connector_free{$paulPlentyFreeNr} && $paulPlentyFreeActive}
		<div class="product--badge badge--newcomer">
			{$paulPlentyFreeText}
		</div>
	{/if}
  {$smarty.block.parent}
{/block}
