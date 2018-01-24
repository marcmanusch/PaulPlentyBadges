{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_hint'}
	{if $paulPlentyFreeActive}
		
		{assign var="paulPlentyFreeField" value="plenty_connector_free{$paulPlentyFreeNr}"}
		
		{if !empty($sArticle.{$paulPlentyFreeField})}
			<div class="product--badge badge--newcomer">
				{$sArticle.{$paulPlentyFreeField}}  
			</div>
		{/if}
	{/if}
	{$smarty.block.parent}
{/block}
