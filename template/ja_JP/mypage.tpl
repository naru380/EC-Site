<h2>マイページ</h2>
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
