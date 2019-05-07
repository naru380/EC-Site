<h2>お問い合わせ</h2>

<div id="contact">
    <form action="." method="post">
        <table border="0">
            <p class="error_message">{message name="login_error"}</p>
            <tr>
                <td>名前</td>
                <td><input type="text" name="name" value="{$form.name}"></td>
                <td class="error_message">{message name="name"}</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="email" name="mail_address" value="{$form.mail_address}"></td>
                <td class="error_message">{message name="mail_address"}</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>お問い合わせ内容　</td>
                <td><textarea name="content" value="" cols="50" rows="10" style="resize: none;"></textarea></td>
                <td class="error_message">{message name="content"}</td>
            </tr>
        </table>
        <br>
        <p>
            <input type="submit" name="action_contact_do" value="送信">
        </p>
    </form>
</div>

