{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_hint'}
	{*{if $paulPlentyFreeActive}
		
		{assign var="paulPlentyFreeField" value="plenty_connector_free{$paulPlentyFreeNr}"}
		
		{if $sArticle.{$paulPlentyFreeField} != ""}
			<div class="product--badge badge--newcomer badge--paulPlenty">
				{$sArticle.{$paulPlentyFreeField}}  
			</div>
		{/if}
	{/if}*}

    {if $sArticle.attributes.paul_listing_badges->get('paul_plenty_badge')}
        {$paul_plenty_badge = $sArticle.attributes.paul_listing_badges->get('paul_plenty_badge')}

		<div class="product--badge badge--newcomer badge--paulPlenty">
            {$paul_plenty_badge}
		</div>
    {/if}
	{$smarty.block.parent}
{/block}
