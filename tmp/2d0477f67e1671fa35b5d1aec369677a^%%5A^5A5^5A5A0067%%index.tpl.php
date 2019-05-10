<?php /* Smarty version 2.6.31, created on 2019-05-10 16:37:53
         compiled from admin/index.tpl */ ?>
<h1>管理ページ</h1>

<h2> メッセージ</h2>
<?php echo $this->_tpl_vars['form']['message']; ?>


<h2>エラー</h2>
<?php if (count ( $this->_tpl_vars['errors'] ) > 0): ?>
    入力内容にエラーがあります。
<?php endif; ?>

<h2>セッション</h2>
<p>auth=<?php echo $this->_tpl_vars['session']['auth']; ?>
</p>
<p>id=<?php echo $this->_tpl_vars['session']['id']; ?>
</p>
<p>mode=<?php echo $this->_tpl_vars['session']['mode']; ?>
</p>