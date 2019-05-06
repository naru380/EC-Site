<?php /* Smarty version 2.6.31, created on 2019-05-06 14:09:06
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'index.tpl', 9, false),array('function', 'message', 'index.tpl', 11, false),array('function', 'form_input', 'index.tpl', 12, false),array('function', 'form_submit', 'index.tpl', 13, false),)), $this); ?>
  <h2>Index Page</h2>
  <p>Wlcome to Ethnam!</p>

<h2>投稿</h2>
<?php if (count ( $this->_tpl_vars['errors'] ) > 0): ?>
    入力内容にエラーがあります。
<?php endif; ?>

<?php $this->_tag_stack[] = array('form', array('name' => 'form_comment','ethna_action' => 'commit')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    投稿内容：
    <?php echo smarty_function_message(array('name' => 'comment'), $this);?>
<br/ >
    <?php echo smarty_function_form_input(array('name' => 'comment'), $this);?>

    <?php echo smarty_function_form_submit(array('value' => "送信"), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<h2>投稿内容</h2>
<?php echo $this->_tpl_vars['form']['comment']; ?>


<h2>セッション</h2>
<p>auth=<?php echo $this->_tpl_vars['session']['auth']; ?>
</p>
<p>id=<?php echo $this->_tpl_vars['session']['id']; ?>
</p>
<p>name=<?php echo $this->_tpl_vars['session']['name']; ?>
</p>
<p>mail_address=<?php echo $this->_tpl_vars['session']['mail_address']; ?>
</p>
<p>password=<?php echo $this->_tpl_vars['session']['password']; ?>
</p>