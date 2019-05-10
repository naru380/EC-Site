<?php /* Smarty version 2.6.31, created on 2019-05-08 01:36:44
         compiled from mail/purchase.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'mail/purchase.tpl', 7, false),)), $this); ?>
<?php echo $this->_tpl_vars['username']; ?>
様
この度は通販サイトにご利用ありがとうございます。
商品の到着までしばらくお待ちください。

---購入商品---
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php echo $this->_tpl_vars['item']['name']; ?>
: ¥<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
 × <?php echo $this->_tpl_vars['item']['num']; ?>
点 = ¥<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price']*$this->_tpl_vars['item']['num'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>

<?php endforeach; endif; unset($_from); ?>

合計:¥<?php echo ((is_array($_tmp=$this->_tpl_vars['check'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>

配達先:<?php echo $this->_tpl_vars['address']; ?>
