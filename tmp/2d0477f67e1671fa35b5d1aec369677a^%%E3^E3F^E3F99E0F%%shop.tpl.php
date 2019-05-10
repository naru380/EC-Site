<?php /* Smarty version 2.6.31, created on 2019-05-10 11:27:13
         compiled from admin/shop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'admin/shop.tpl', 5, false),)), $this); ?>
<div id="admin_shop">
    <h2>商品追加</h2>
    <form action="." method="post" enctype="multipart/form-data">
        <table border="0">
            <p class="error_message"><?php echo smarty_function_message(array('name' => 'login_error'), $this);?>
</p>
            <tr>
                <td>商品名　</td>
                <td><input type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'name'), $this);?>
</td>
            </tr>
            <tr>
                <td>値段</td>
                <td><input type="text" name="price" value="<?php echo $this->_tpl_vars['form']['price']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'price'), $this);?>
</td>
            </tr>
            <tr>
                <td>説明</td>
                <td><textarea name="description" cols="50" rows="5" style="resize: none; border: solid 1px #DDDDDD"><?php echo $this->_tpl_vars['form']['description']; ?>
</textarea></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'description'), $this);?>
</td>
            </tr>
            <tr>
                <td>画像</td>
                <td><input type="file" name="image" value=""></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'image'), $this);?>
</td>
            </tr>
        </table>
        <p>
            <input type="submit" name="action_admin_shop_do" value="追加">
        </p>
    </form>
</div>