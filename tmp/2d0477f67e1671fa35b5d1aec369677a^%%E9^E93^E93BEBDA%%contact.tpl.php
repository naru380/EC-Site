<?php /* Smarty version 2.6.31, created on 2019-05-07 10:42:10
         compiled from contact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'contact.tpl', 6, false),)), $this); ?>
<h2>お問い合わせ</h2>

<div id="contact">
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
                <td><br></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="email" name="mail_address" value="<?php echo $this->_tpl_vars['form']['mail_address']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'mail_address'), $this);?>
</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>お問い合わせ内容　</td>
                <td><textarea name="content" value="" cols="50" rows="10" style="resize: none;"></textarea></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'content'), $this);?>
</td>
            </tr>
        </table>
        <br>
        <p>
            <input type="submit" name="action_contact_do" value="送信">
        </p>
    </form>
</div>
