  <h2>Index Page</h2>
  <p>Wlcome to Ethnam!</p>

<h2>投稿</h2>
{if count($errors) > 0}
    入力内容にエラーがあります。
{/if}

{form name="form_comment" ethna_action="commit"}
    投稿内容：
    {message name="comment"}<br/ >
    {form_input name="comment"}
    {form_submit value="送信"}
{/form}

<h2>投稿内容</h2>
{$form.comment}

<h2>セッション</h2>
<p>auth={$session.auth}</p>
<p>id={$session.id}</p>
<p>name={$session.name}</p>
<p>mail_address={$session.mail_address}</p>
<p>password={$session.password}</p>
