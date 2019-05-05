<h2>取扱商品</h2>
{foreach from=$form.items item=item}
    <div class="item-list">
        {if $item.image != NULL}
            <img src="{"./images/"|cat:$item.image}">
        {else}
            <img src="./images/0.jpg">
        {/if}
        <div class="item-list-text">
            <h3>{$item.name}</h3>
            <p>¥{$item.price|number_format}</p>
            {*
            <p>説明: {$item.description}</p>
            *}
            {assign var="request" value="/?action_item=true&item_id="|cat:$item.id}
            <input type="button" onclick={"location.href='$request'"} value="商品詳細ページ">
        </div>
    </div>
{/foreach}
