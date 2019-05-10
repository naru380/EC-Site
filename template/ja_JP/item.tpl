{if $session.mode == 'admin'}
<div style="float: right;">
    <form action="." method="post">
    <!--
        <input type="submit" name="action_admin_shop_edit" value="商品を編集">
    -->
        <input type="hidden" name="item_id" value="{$form.item.id}">
        <input type="submit" name="action_admin_shop_delete" value="商品を削除">
    </form>
</div>
{/if}

<h2>商品詳細</h2>

<div id="item-detail">
    {if $form.item.image != NULL}
        <img src="{"./images/"|cat:$form.item.image}">
    {else}
        <img src="./images/0.jpg">
    {/if}
    <div id="item-detail-text">
        <h3>{$form.item.name}</h3>
        <div id="item-detail-text-purchase">
            <p id="item-detail-text-purchase-price">¥{$form.item.price|number_format}</p>
            <div id="item-detail-text-purchase-inputs">
                <form action="." method="post">
                    <input type="hidden" name="item_id" value="{$form.item.id}">
                    <input type="number" name="item_num" value="1" min="1" required>
                    <input type="submit" name="action_mycart_add" value="カートに追加">
                </form>
            </div>
        </div>
        <div class="item-description">
            <p>説明:</p>
            <p class="item-desctiption-text">{$form.item.description}</p>
        </div>
    </div>
</div>

