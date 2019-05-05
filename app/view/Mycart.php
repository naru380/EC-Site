<?php
/**
 *  Mycart.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  mycart view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_Mycart extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $mm = new Sample_MycartManager();
        //$mycart = $mm->getMycart($this->session->get('id'));
        $mycart = $mm->getMycart(1);

        $check = 0;
        foreach ($mycart as $item) {
            $check += $item['price'] * $item['num']; 
        }

        $this->af->set('mycart', $mycart);
        $this->af->set('check', $check);
    }
}

