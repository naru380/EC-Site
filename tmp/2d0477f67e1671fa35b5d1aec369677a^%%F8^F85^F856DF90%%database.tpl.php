<?php /* Smarty version 2.6.31, created on 2019-04-21 23:57:22
         compiled from test/database.tpl */ ?>
<h2>Test Database</h2>
<?php $_from = $this->_tpl_vars['form']['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
<h3><?php echo $this->_tpl_vars['user']['id']; ?>
</h3>
<p>ユーザ名: <?php echo $this->_tpl_vars['user']['name']; ?>
</p>
<p>メールアドレス: <?php echo $this->_tpl_vars['user']['mail_address']; ?>
</p>
<p>パスワード: <?php echo $this->_tpl_vars['user']['password']; ?>
</p>
<?php endforeach; endif; unset($_from); ?>
