<div id="shop">
    <div id="search-box">
        <form action="." method="post">
            <input type="search" name="search" placeholder="キーワード" value="{$form.search}">
            <input type="submit" name="action_search_item" value="検索">
        </form>
        {if $form.item_num >= 0}
            <p>検索結果:{$form.item_num}件</p>
        {/if}
    </div>

    <div class="shop-list">
        <h2>取扱商品</h2>
        {foreach from=$form.items item=item}
            <div class="shop-list-item">
                {if $item.image != NULL}
                    <img src="{"./images/"|cat:$item.image}">
                {else}
                    <img src="./images/0.jpg">
                {/if}
                <div class="shop-list-item-text">
                    <h3>{$item.name}</h3>
                    <p class="item-price">¥{$item.price|number_format}</p>
                    {*
                    <p>説明: {$item.description}</p>
                    *}
                    {assign var="request" value="/?action_item=true&item_id="|cat:$item.id}
                    <input type="button" onclick={"location.href='$request'"} value="商品詳細ページ">
                </div>
            </div>
        {/foreach}
    </div>
</div>
