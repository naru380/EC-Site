<?php /* Smarty version 2.6.31, created on 2019-05-10 14:11:15
         compiled from item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'item.tpl', 5, false),array('modifier', 'number_format', 'item.tpl', 12, false),)), $this); ?>
<h2>商品詳細</h2>

<div id="item-detail">
    <?php if ($this->_tpl_vars['form']['item']['image'] != NULL): ?>
        <img src="<?php echo ((is_array($_tmp="./images/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['form']['item']['image']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['form']['item']['image'])); ?>
">
    <?php else: ?>
        <img src="./images/0.jpg">
    <?php endif; ?>
    <div id="item-detail-text">
        <h3><?php echo $this->_tpl_vars['form']['item']['name']; ?>
</h3>
        <div id="item-detail-text-purchase">
            <p id="item-detail-text-purchase-price">¥<?php echo ((is_array($_tmp=$this->_tpl_vars['form']['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
            <div id="item-detail-text-purchase-inputs">
                <form action="." method="post">
                    <input type="hidden" name="item_id" value="<?php echo $this->_tpl_vars['form']['item']['id']; ?>
">
                    <input type="number" name="item_num" value="1" min="1" required>
                    <input type="submit" name="action_mycart_add" value="カートに追加">
                </form>
            </div>
        </div>
        <div class="item-description">
            <p>説明:</p>
            <p class="item-desctiption-text"><?php echo $this->_tpl_vars['form']['item']['description']; ?>
</p>
        </div>
    </div>
</div>