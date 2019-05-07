<?php /* Smarty version 2.6.31, created on 2019-05-07 09:38:49
         compiled from user/register.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'user/register.tpl', 5, false),array('function', 'uniqid', 'user/register.tpl', 22, false),)), $this); ?>
<div id="user_register_form">
    <h2>新規登録</h2>
    <form action="." method="post">
        <table border="0">
            <p class="error_message"><?php echo smarty_function_message(array('name' => 'login_error'), $this);?>
</p>
            <tr>
                <td>名前</td>
                <td><input type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'name'), $this);?>
</td>
            </tr>
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
        <?php echo smarty_function_uniqid(array(), $this);?>

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