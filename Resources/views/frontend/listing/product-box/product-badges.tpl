{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_hint'}
	{if $paulPlentyFreeActive}
	
		{assign var="freeField" value="$sArticle.plenty_connector_free{$paulPlentyFreeNr}"}
		
			<div class="product--badge badge--newcomer">
				{$freeField}
			</div>
	{/if}
	{$smarty.block.parent}
{/block}
