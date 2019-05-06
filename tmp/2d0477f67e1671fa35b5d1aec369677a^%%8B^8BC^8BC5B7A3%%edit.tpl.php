<?php /* Smarty version 2.6.31, created on 2019-05-06 20:57:20
         compiled from mypage/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'mypage/edit.tpl', 5, false),)), $this); ?>
<h2>アカウント情報の編集</h2>
<div id="mypage_edit">
    <form action="." method="post">
        <table border="0">
            <p class="error_message"><?php echo smarty_function_message(array('name' => 'edit_error'), $this);?>
</p>
            <tr>
                <td>名前　</td>
                <td><input type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'name'), $this);?>
</td>
            </tr>
            <tr>
                <td>住所</td>
                <td><input type="text" name="address" value="<?php echo $this->_tpl_vars['form']['address']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'address'), $this);?>
</td>
            </tr>
            <!--
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="mail_address" value="<?php echo $this->_tpl_vars['form']['mail_address']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'mail_address'), $this);?>
</td>
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
                <td><input type="password" name="new_password" value="<?php echo $this->_tpl_vars['form']['new_password']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'new_password'), $this);?>
</td>
            </tr>
            <tr>
                <td>新しいパスワード(確認)　</td>
                <td><input type="password" name="confirm_password" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</td>
            </tr>
        </table>
        -->

        <br>
        <br>

        <p>現在のパスワードを入力して下さい</p>
        <input type="password" name="password" value="">
        <input type="submit" name="action_mypage_edit_do" value="編集完了">
        <span class="error_message"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</span>
    </form>
</div>