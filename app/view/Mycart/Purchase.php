<?php
/**
 *  Mycart/Purchase.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  mycart_purchase view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_MycartPurchase extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $um = new Sample_UserManager();
        $user = $um->getUserInfo($this->session->get('id'));

        $this->af->set('name', $user['name']);
        $this->af->set('address', $user['address']);

        $mm = new Sample_MycartManager();
        $mycart = $mm->getMycart($this->session->get('id'));

        $check = 0;
        foreach ($mycart as $item) {
            $check += $item['price'] * $item['num']; 
        }

        $this->af->set('mycart', $mycart);
        $this->af->set('check', $check);
    }
}

