{extends file="parent:frontend/detail/image.tpl"}


{block name="frontend_detail_image_box"}

    {assign var="paulPlentyFreeField" value="plenty_connector_free{$paulPlentyFreeNr}"}

    {if $paulPlentyFreeActive && {$sArticle.{$paulPlentyFreeField}}}
        <div class="ribbon is--right">
            <p class="ribbon--content green">{$sArticle.{$paulPlentyFreeField}}</p>
        </div>
    {/if}
    {$smarty.block.parent}
{/block}