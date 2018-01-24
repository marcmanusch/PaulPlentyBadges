{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_hint'}
	{if ($sArticle.plenty_connector_free{$paulPlentyFreeNr}) and $paulPlentyFreeActive}
		<div class="product--badge badge--newcomer">
			{$sArticle.plenty_connector_free{$paulPlentyFreeNr}}
		</div>
	{/if}
	{$smarty.block.parent}
{/block}
