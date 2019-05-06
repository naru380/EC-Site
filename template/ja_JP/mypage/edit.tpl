<h2>アカウント情報の編集</h2>
<div id="mypage_edit">
    <form action="." method="post">
        <table border="0">
            <p class="error_message">{message name="edit_error"}</p>
            <tr>
                <td>名前　</td>
                <td><input type="text" name="name" value="{$form.name}"></td>
                <td class="error_message">{message name="name"}</td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input type="text" name="address" value="{$form.address}"></td>
                <td class="error_message">{message name="address"}</td>
            </tr>
            <!--
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="mail_address" value="{$form.mail_address}"></td>
                <td class="error_message">{message name="mail_address"}</td>
            </tr>
            -->
            <tr>
            </tr>
        </table>
        <!--
        <table>
            </tr>
                <td><br></td>
            <tr>
                <td>新しいパスワード</td>
                <td><input type="password" name="new_password" value="{$form.new_password}"></td>
                <td class="error_message">{message name="new_password"}</td>
            </tr>
            <tr>
                <td>新しいパスワード(確認)　</td>
                <td><input type="password" name="confirm_password" value=""></td>
                <td class="error_message">{message name="password"}</td>
            </tr>
        </table>
        -->

        <br>
        <br>

        <p>現在のパスワードを入力して下さい</p>
        <input type="password" name="password" value="">
        <input type="submit" name="action_mypage_edit_do" value="編集完了">
        <span class="error_message">{message name="password"}</span>
    </form>
</div>
