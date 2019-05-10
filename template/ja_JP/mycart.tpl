<h2>マイカート</h2>

{foreach from=$form.mycart item=item}
    <div class="mycart-item">
        {if $item.image != NULL}
            <img src="{"./images/"|cat:$item.image}">
        {else}
            <img src="./images/0.jpg">
        {/if}
        <div class="mycart-item-text">
            <h3>{$item.name}</h3>
            <p>
                <span class="item-price">¥{$item.price|number_format}</span>
                 × {$item.num}個
            </p>
            {assign var="request" value="/?action_item=true&item_id="|cat:$item.id}
            <form action="." method="post">
                <input type="hidden" name="delete" value="{$item.id}">
                <input type="submit" name="action_mycart_delete" value="削除">
            </form>
            <input type="button" onclick={"location.href='$request'"} value="商品詳細">
        </div>
    </div>
{/foreach}

<div class="mycart-procedure-dummy">
    <div class="mycart-procedure">
        <p>合計: <span class="item-price">¥{$form.check|number_format}</span></p>
        <form action="." method="post">
            <input type="hidden" name="delete" value="0">
            <input type="submit" name="action_mycart_delete" value="全て削除">
        </form>
        <form action="." method="post">
            <input type="submit" name="action_mycart_purchase" value="購入手続き">
        </form>
    </div>
</div>
