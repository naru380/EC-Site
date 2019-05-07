<h2>マイカート</h2>

{foreach from=$form.mycart item=item}
    <div class="mycart-item">
        {if $item.image != NULL}
            <img src="{"./images/"|cat:$item.image}">
        {else}
            <img src="./images/0.jpg">
        {/if}
        <div class="mycart-item-text">
            <p>{$item.name}</p>
            <p>{$item.price|number_format}</p>
            <p>{$item.num}個</p>
            {assign var="request" value="/?action_item=true&item_id="|cat:$item.id}
            <input type="button" onclick={"location.href='$request'"} value="商品詳細">
            <form action="." method="post">
                <input type="hidden" name="delete" value="{$item.id}">
                <input type="submit" name="action_mycart_delete" value="削除">
            </form>
        </div>
    </div>
{/foreach}

<div class="mycart-prcedure">
    <p>合計: {$form.check|number_format}円</p>
    <form action="." method="post">
        <input type="hidden" name="delete" value="0">
        <input type="submit" name="action_mycart_delete" value="全て削除">
    </form>
    <form action="." method="post">
        <input type="hidden" name="delete" value="0">
        <input type="submit" name="action_mycart_confirm" value="購入手続き">
    </form>
</div>
