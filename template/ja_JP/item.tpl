<h2>商品詳細</h2>
<div id="item-detail-image">
{if $form.item.image != NULL}
    <img src="{"./images/"|cat:$form.item.image}">
{else}
    <img src="./images/0.jpg">
{/if}
<div class="item-detail-text">
    <h3>{$form.item.name}</h3>
    <p>¥{$form.item.price|number_format}</p>
    <p>説明: {$form.item.description}</p>
    {assign var="request" value="/?action_item=true&item_id="|cat:$form.item.id}
    <input type="button" onclick={"location.href='$request'"} value="商品詳細ページ">
</div>

<form action="." method="post">
    <input type="hidden" name="item_id" value="{$form.item.id}">
    <input type="number" name="item_num" value="1" min="1" required>
    <input type="submit" name="action_mycart_add" value="カートに追加">
</form>
