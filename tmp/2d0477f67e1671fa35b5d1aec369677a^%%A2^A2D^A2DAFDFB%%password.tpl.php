<?php /* Smarty version 2.6.31, created on 2019-05-06 21:52:03
         compiled from change/password.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'change/password.tpl', 8, false),)), $this); ?>
<h2>パスワードの変更</h2>
<div id="change_password">
    <form action="." method="post">
        <table border="0">
            <tr>
                <td>新しいパスワード</td>
                <td><input type="password" name="new_password" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'new_password'), $this);?>
</td>
            </tr>
            <tr>
                <td>新しいパスワード(確認)　</td>
                <td><input type="password" name="confirm_password" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'confirm_password'), $this);?>
</td>
            </tr>
        </table>

        <br>
        <br>

        <p>現在のパスワードを入力して下さい</p>
        <input type="password" name="password" value="">
        <input type="submit" name="action_change_password_do" value="編集完了">
        <span class="error_message"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</span>
    </form>
</div>