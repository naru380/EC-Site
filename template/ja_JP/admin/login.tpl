<h2>管理者認証</h2>

<div id="admin_login_form">
    <form action="." method="post">
        <table border="0">
            <p class="error_message">{message name="login_error"}</p>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value=""></td>
                <td class="error_message">{message name="id"}</td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                
                <td><input type="password" name="password" value=""></td>
                <td class="error_message">{message name="password"}</td>
            </tr>
        </table>
        <p>
            <input type="submit" name="action_admin_login_do" value="認証">
        </p>
    </form>
</div>
