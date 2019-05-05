<?php /* Smarty version 2.6.31, created on 2019-05-04 10:54:30
         compiled from shop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'shop.tpl', 5, false),array('modifier', 'number_format', 'shop.tpl', 11, false),)), $this); ?>
<h2>取扱商品</h2>
<?php $_from = $this->_tpl_vars['form']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <div class="item-list">
        <?php if ($this->_tpl_vars['item']['image'] != NULL): ?>
            <img src="<?php echo ((is_array($_tmp="./images/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['image']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['image'])); ?>
">
        <?php else: ?>
            <img src="./images/0.jpg">
        <?php endif; ?>
        <div class="item-list-text">
            <h3><?php echo $this->_tpl_vars['item']['name']; ?>
</h3>
            <p>¥<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
                        <?php $this->assign('request', ((is_array($_tmp="/?action_item=true&item_id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['id']))); ?>
            <input type="button" onclick=<?php echo "location.href='".($this->_tpl_vars['request'])."'"; ?>
 value="商品詳細ページ">
        </div>
    </div>
<?php endforeach; endif; unset($_from); ?>