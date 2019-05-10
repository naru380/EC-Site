<?php /* Smarty version 2.6.31, created on 2019-05-10 23:35:38
         compiled from mypage.tpl */ ?>
<div id="myaccount">
    <h2>アカウント情報</h2>
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
</div>

<div id="order-history">
    <h2>注文履歴</h2>
    <?php $_from = $this->_tpl_vars['form']['myorders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['buy_at'] => $this->_tpl_vars['myorder']):
?>
        <div class="order">
            <p>注文日時:<?php echo $this->_tpl_vars['buy_at']; ?>
</p>
            <?php $this->assign('sum_price', 0); ?>
            <?php $_from = $this->_tpl_vars['myorder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item_id'] => $this->_tpl_vars['item']):
?>
                <p><?php echo $this->_tpl_vars['item']['name']; ?>
 × <?php echo $this->_tpl_vars['item']['num']; ?>
</p>
                <?php $this->assign('sum_price', $this->_tpl_vars['sum_price']+$this->_tpl_vars['item']['num']*$this->_tpl_vars['item']['price']); ?>
            <?php endforeach; endif; unset($_from); ?>
            <p>合計金額:<span class="item-price">¥<?php echo $this->_tpl_vars['sum_price']; ?>
</span></p>
            <br>
        </div>
    <?php endforeach; endif; unset($_from); ?>
</div>