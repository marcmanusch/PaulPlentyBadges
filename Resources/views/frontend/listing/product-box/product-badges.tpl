{extends file='parent:frontend/listing/product-box/product-badges.tpl'}

{block name='frontend_listing_box_article_discount'}

    {if $sArticle.attributes.paul_listing_badges && $sArticle.attributes.paul_listing_badges->get('paul_plenty_badge')}
        <div class="product--badge badge--paulPlenty" style="background-color: {$PaulPlentyBadgesListingBackground}; color: {$PaulPlentyBadgesListingText}">
            {$sArticle.attributes.paul_listing_badges->get('paul_plenty_badge')}
        </div>
    {/if}
    {$smarty.block.parent}
{/block}
