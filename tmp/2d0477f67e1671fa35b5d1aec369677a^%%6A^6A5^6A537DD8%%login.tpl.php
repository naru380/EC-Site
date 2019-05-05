<?php /* Smarty version 2.6.31, created on 2019-05-05 12:36:13
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'login.tpl', 5, false),)), $this); ?>
<div id="login_form">
    <h2>認証フォーム</h2>
    <form action="." method="post">
        <table border="0">
            <p class="error_message"><?php echo smarty_function_message(array('name' => 'login_error'), $this);?>
</p>
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="mail_address" value="<?php echo $this->_tpl_vars['form']['mail_address']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'mail_address'), $this);?>
</td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="password" name="password" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</td>
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