<h2>購入手続き</h2>

<div id="mycart_purchase">
    <form action="." method="post">
        <table border="0">
            <p class="error_message">{message name="edit_error"}</p>
            <tr>
                <td>お名前</td>
                <td><input type="text" name="name" value="{$form.name}"></td>
                <td class="error_message">{message name="name"}</td>
            </tr>
            <!--
            <tr>
                <td><br></td>
            </tr>
            -->
            <tr>
                <td>お届け先　</td>
                <td><input type="text" name="address" value="{$form.address}"></td>
                <td class="error_message">{message name="address"}</td>
            </tr>
            <tr>
            </tr>
        </table>

        <br>
        
        <table border="0">
            {foreach from=$form.mycart item=item}
                <tr>
                    <td>{$item.name}</td>
                    <td><pre>  </pre></td>
                    <td>¥{$item.price|number_format}</td>
                    <td><pre>  </pre></td>
                    <td>×</td>
                    <td><pre>  </pre></td>
                    <td>{$item.num}点</td>
                    <td><pre>  </pre></td>
                    <td>=</td>
                    <td><pre>  </pre></td>
                    <td>¥{$item.price*$item.num|number_format}</td>
                </tr>
            {/foreach}
        </table>

        <p>合計: 
        <span class="item-price">¥{$form.check|number_format}</span>
        <input type="submit" name="action_mycart_purchase_do" value="購入">
        <input type="hidden" name="mycart_purchase_do" value="">
        </p>
    </form>
</div>
