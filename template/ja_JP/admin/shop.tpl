<div id="admin_shop">
    <h2>商品追加</h2>
    <form action="." method="post" enctype="multipart/form-data">
        <table border="0">
            <p class="error_message">{message name="login_error"}</p>
            <tr>
                <td>商品名　</td>
                <td><input type="text" name="name" value="{$form.name}"></td>
                <td class="error_message">{message name="name"}</td>
            </tr>
            <tr>
                <td>値段</td>
                <td><input type="text" name="price" value="{$form.price}"></td>
                <td class="error_message">{message name="price"}</td>
            </tr>
            <tr>
                <td>説明</td>
                <td><textarea name="description" cols="50" rows="5" style="resize: none; border: solid 1px #DDDDDD">{$form.description}</textarea></td>
                <td class="error_message">{message name="description"}</td>
            </tr>
            <tr>
                <td>画像</td>
                <td><input type="file" name="image" value=""></td>
                <td class="error_message">{message name="image"}</td>
            </tr>
        </table>
        <p>
            <input type="submit" name="action_admin_shop_do" value="追加">
        </p>
    </form>
</div>
