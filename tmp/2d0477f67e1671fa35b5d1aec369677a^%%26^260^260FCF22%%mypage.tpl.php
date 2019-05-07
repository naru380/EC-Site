<?php /* Smarty version 2.6.31, created on 2019-05-07 00:59:39
         compiled from mypage.tpl */ ?>
<h2>マイページ</h2>
<p>名前: <?php echo $this->_tpl_vars['form']['user']['name']; ?>
</p>
<p>住所: <?php echo $this->_tpl_vars['form']['user']['address']; ?>
</p>
<p>メールアドレス: <?php echo $this->_tpl_vars['form']['user']['mail_address']; ?>
</p>
<p>登録日: <?php echo $this->_tpl_vars['form']['user']['created_at']; ?>
</p>
<!--
<p>パスワード: <?php echo $this->_tpl_vars['form']['password']; ?>
</p>
-->

<br>

<a href="/?action_mypage_edit=true">アカウント情報の編集</a>
<a href="/?action_change_password=true">パスワードの変更</a>
<a href="/?action_user_leave=true">退会</a>