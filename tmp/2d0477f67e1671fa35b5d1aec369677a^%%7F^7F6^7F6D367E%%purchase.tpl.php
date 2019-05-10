<?php /* Smarty version 2.6.31, created on 2019-05-08 01:17:20
         compiled from mycart/purchase.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'message', 'mycart/purchase.tpl', 6, false),array('modifier', 'number_format', 'mycart/purchase.tpl', 33, false),)), $this); ?>
<h2>購入手続き</h2>

<div id="mycart_purchase">
    <form action="." method="post">
        <table border="0">
            <p class="error_message"><?php echo smarty_function_message(array('name' => 'edit_error'), $this);?>
</p>
            <tr>
                <td>お名前</td>
                <td><input type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'name'), $this);?>
</td>
            </tr>
            <!--
            <tr>
                <td><br></td>
            </tr>
            -->
            <tr>
                <td>お届け先　</td>
                <td><input type="text" name="address" value="<?php echo $this->_tpl_vars['form']['address']; ?>
"></td>
                <td class="error_message"><?php echo smarty_function_message(array('name' => 'address'), $this);?>
</td>
            </tr>
            <tr>
            </tr>
        </table>

        <br>
        
        <table border="0">
            <?php $_from = $this->_tpl_vars['form']['mycart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <tr>
                    <td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
                    <td><pre>  </pre></td>
                    <td>¥<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                    <td><pre>  </pre></td>
                    <td>×</td>
                    <td><pre>  </pre></td>
                    <td><?php echo $this->_tpl_vars['item']['num']; ?>
点</td>
                    <td><pre>  </pre></td>
                    <td>=</td>
                    <td><pre>  </pre></td>
                    <td>¥<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price']*$this->_tpl_vars['item']['num'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>

        <p>合計: 
        <span class="item-price">¥<?php echo ((is_array($_tmp=$this->_tpl_vars['form']['check'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</span>
        <input type="submit" name="action_mycart_purchase_do" value="購入">
        <input type="hidden" name="mycart_purchase_do" value="">
        </p>
    </form>
</div>