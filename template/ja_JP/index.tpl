<div class="index">
    <h2>通販サイトからのお知らせ</h2>
    <p>2019/05/10 本サイトオープン</p>
    <br>

    <h2>注目の商品ベスト３</h2>
    <div class="attracted-items">
        {assign var="i" value=1}
        {foreach from=$form.most_viewed_items item=item}
            <div class="attracted-item">
                <h3>{$i}位</h3>
                {if $item.image != NULL}
                    <img src="{"./images/"|cat:$item.image}">
                {else}
                    <img src="./images/0.jpg">
                {/if}
                <div class="attracted-item-text">
                    <p>{$item.name}</p>
                    <p class="item-price">¥{$item.price|number_format}</p>
                    {assign var="request" value="/?action_item=true&item_id="|cat:$item.id}
                    <input type="button" onclick={"location.href='$request'"} value="商品詳細ページ">
                </div>
                {assign var="i" value=$i+1}
            </div>
        {/foreach}
    </div>
</div>
