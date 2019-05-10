<?php /* Smarty version 2.6.31, created on 2019-05-07 22:48:23
         compiled from admin/index.tpl */ ?>
<h1>テストページ</h1>

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