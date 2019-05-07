<?php /* Smarty version 2.6.31, created on 2019-05-06 22:43:36
         compiled from user/leave.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'user/leave.tpl', 8, false),)), $this); ?>
<h2>退会</h2>

<div id="user_leave">
    <form action="." method="post">
        <p>現在のパスワードを入力して下さい</p>
        <input type="password" name="password" value="">
        <input type="submit" name="action_user_leave_do" value="進む">
        <span class="error_message"><?php echo smarty_function_message(array('name' => 'password'), $this);?>
</span>
    </form>
</div>