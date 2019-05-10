<div id="myaccount">
    <h2>アカウント情報</h2>
    <p>名前: {$form.user.name}</p>
    <p>住所: {$form.user.address}</p>
    <p>メールアドレス: {$form.user.mail_address}</p>
    <p>登録日: {$form.user.created_at}</p>
    <!--
    <p>パスワード: {$form.password}</p>
    -->

    <br>

    <a href="/?action_mypage_edit=true">アカウント情報の編集</a>
    <a href="/?action_change_password=true">パスワードの変更</a>
    <a href="/?action_user_leave=true">退会</a>
</div>

<div id="order-history">
    <h2>注文履歴</h2>
    {foreach from=$form.myorders item=myorder key=buy_at}
        <div class="order">
            <p>注文日時:{$buy_at}</p>
            {assign var="sum_price" value=0}
            {foreach from=$myorder item=item key=item_id}
                <p>{$item.name} × {$item.num}</p>
                {assign var="sum_price" value=$sum_price+$item.num*$item.price}
            {/foreach}
            <p>合計金額:<span class="item-price">¥{$sum_price}</span></p>
            <br>
        </div>
    {/foreach}
</div>
