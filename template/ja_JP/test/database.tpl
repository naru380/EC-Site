<h2>Test Database</h2>
{foreach from=$form.users item=user}
<h3>{$user.id}</h3>
<p>ユーザ名: {$user.name}</p>
<p>メールアドレス: {$user.mail_address}</p>
<p>パスワード: {$user.password}</p>
{/foreach}

