<div id="login_form">
    <h2>認証フォーム</h2>
    <form action="." method="post">
        <table border="0">
            <p class="error_message">{message name="login_error"}</p>
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
        <p>
            <input type="submit" name="action_login_do" value="ログイン">
        </p>
    </form>

    <br>

    <p>はじめてご利用ですか？新規登録は<a href="/?action_user_register=true">こちら</a></p>

    <!--
    <form action="." method="post">
        <input type="submit" name="action_user_create" value="新規登録">
    </form>
    -->
</div>
