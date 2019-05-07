<?php /* Smarty version 2.6.31, created on 2019-05-07 22:18:57
         compiled from mycart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'mycart.tpl', 6, false),array('modifier', 'number_format', 'mycart.tpl', 12, false),)), $this); ?>
<h2>マイカート</h2>

<?php $_from = $this->_tpl_vars['form']['mycart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="mycart-item">
        <?php if ($this->_tpl_vars['item']['image'] != NULL): ?>
            <img src="<?php echo ((is_array($_tmp="./images/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['image']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['image'])); ?>
">
        <?php else: ?>
            <img src="./images/0.jpg">
        <?php endif; ?>
        <div class="mycart-item-text">
            <p><?php echo $this->_tpl_vars['item']['name']; ?>
</p>
            <p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
            <p><?php echo $this->_tpl_vars['item']['num']; ?>
個</p>
            <?php $this->assign('request', ((is_array($_tmp="/?action_item=true&item_id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['id']))); ?>
            <input type="button" onclick=<?php echo "location.href='".($this->_tpl_vars['request'])."'"; ?>
 value="商品詳細">
            <form action="." method="post">
                <input type="hidden" name="delete" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
                <input type="submit" name="action_mycart_delete" value="削除">
            </form>
        </div>
    </div>
<?php endforeach; endif; unset($_from); ?>

<div class="mycart-prcedure">
    <p>合計: <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['check'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
円</p>
    <form action="." method="post">
        <input type="hidden" name="delete" value="0">
        <input type="submit" name="action_mycart_delete" value="全て削除">
    </form>
    <form action="." method="post">
        <input type="hidden" name="delete" value="0">
        <input type="submit" name="action_mycart_confirm" value="購入手続き">
    </form>
</div>