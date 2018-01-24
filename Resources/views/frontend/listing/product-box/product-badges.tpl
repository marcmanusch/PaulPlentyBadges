{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_hint'}
	{if $paulPlentyFreeActive}
		{assign var="freeField" value="plenty_connector_free{$paulPlentyFreeNr}"}
		{if $sArticle.$freeField}
			<div class="product--badge badge--newcomer">
				test
			</div>
		{/if}
	{/if}
	{$smarty.block.parent}
{/block}
