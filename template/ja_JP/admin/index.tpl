<h1>テストページ</h1>

<h2>エラー</h2>
{if count($errors) > 0}
    入力内容にエラーがあります。
{/if}

<h2>セッション</h2>
<p>auth={$session.auth}</p>
<p>id={$session.id}</p>
<p>mode={$session.mode}</p>
