<?php /* Smarty version 2.6.31, created on 2019-05-05 17:25:18
         compiled from mypage.tpl */ ?>
<h2>マイページ</h2>
<p>アカウント名: <?php echo $this->_tpl_vars['form']['name']; ?>
</p>
<p>メールアドレス: <?php echo $this->_tpl_vars['form']['mail_address']; ?>
</p>
<!--
<p>パスワード: <?php echo $this->_tpl_vars['form']['password']; ?>
</p>
-->

<br>

<a href="/?action_mypage_edit=true">編集</a>
<a href="/?action_user_register=true">退会</a>
