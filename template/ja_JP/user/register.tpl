<div id="user_register_form">
    <h2>新規登録</h2>
    <form action="." method="post">
        <table border="0">
            <p class="error_message">{message name="login_error"}</p>
            <tr>
                <td>名前</td>
                <td><input type="text" name="name" value="{$form.name}"></td>
                <td class="error_message">{message name="name"}</td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="mail_address" value="{$form.mail_address}"></td>
                <td class="error_message">{message name="mail_address"}</td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="password" value=""></td>
                <td class="error_message">{message name="password"}</td>
            </tr>
        </table>
        {uniqid}
        <p>
            <input type="submit" name="action_user_register_do" value="登録">
        </p>
    </form>

    <br>

    <p>すでにアカウントをお持ちですか？ログインは<a href="/?action_login=true">こちら</a></p>

    <!--
    <form action="." method="post">
        <input type="submit" name="action_user_create" value="新規登録">
    </form>
    -->
</div>
