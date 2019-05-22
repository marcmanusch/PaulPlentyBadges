{extends file="parent:frontend/detail/image.tpl"}


{block name="frontend_detail_image_default_image_slider_item"}

    {assign var="paulPlentyFreeField" value="plenty_connector_free{$paulPlentyFreeNr}"}

    {if $paulPlentyFreeActive && {$sArticle.{$paulPlentyFreeField}} && $PaulPlentyBadgesRibonActive}
        <div class="ribbon is--{$PaulPlentyBadgesRibonPosition}">
            <p class="ribbon--content" style="background-color: {$PaulPlentyBadgesRibonColor}; color: {$PaulPlentyBadgesRibonTextColor}">{$sArticle.{$paulPlentyFreeField}}</p>
        </div>
    {/if}
    {$smarty.block.parent}
{/block}