<?php /* Smarty version 2.6.31, created on 2019-05-10 01:27:39
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'index.tpl', 13, false),array('modifier', 'number_format', 'index.tpl', 19, false),)), $this); ?>
<div class="index">
    <h2>通販サイトからのお知らせ</h2>
    <p>2019/05/10 本サイトオープン</p>
    <br>

    <h2>注目の商品ベスト３</h2>
    <div class="attracted-items">
        <?php $this->assign('i', 1); ?>
        <?php $_from = $this->_tpl_vars['form']['most_viewed_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <div class="attracted-item">
                <h3><?php echo $this->_tpl_vars['i']; ?>
位</h3>
                <?php if ($this->_tpl_vars['item']['image'] != NULL): ?>
                    <img src="<?php echo ((is_array($_tmp="./images/")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['image']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['image'])); ?>
">
                <?php else: ?>
                    <img src="./images/0.jpg">
                <?php endif; ?>
                <div class="attracted-item-text">
                    <p><?php echo $this->_tpl_vars['item']['name']; ?>
</p>
                    <p class="item-price">¥<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</p>
                    <?php $this->assign('request', ((is_array($_tmp="/?action_item=true&item_id=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['id']))); ?>
                    <input type="button" onclick=<?php echo "location.href='".($this->_tpl_vars['request'])."'"; ?>
 value="商品詳細ページ">
                </div>
                <?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>