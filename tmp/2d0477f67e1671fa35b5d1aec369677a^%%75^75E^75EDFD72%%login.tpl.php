<?php /* Smarty version 2.6.31, created on 2019-05-07 16:20:55
         compiled from admin/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'admin/login.tpl', 6, false),)), $this); ?>
<h2>管理者認証</h2>

<div id="admin_login_form">
    <form action="." method="post">
        <table border="0">
            <p class="error_message"><?php echo smarty_function_message(array('name' => 'login_error'), $this);?>
</p>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'id'), $this);?>
</td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                
                <td><input type="password" name="password" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</td>
            </tr>
        </table>
        <p>
            <input type="submit" name="action_admin_login_do" value="認証">
        </p>
    </form>
</div>