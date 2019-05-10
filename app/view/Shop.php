<?php
/**
 *  Shop.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  shop view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_Shop extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $im = new Sample_ItemManager();
        if(empty($this->af->get('search'))) {
            $items = $im->getAllItemInfo();
            $this->af->set('items', $items);
            $this->af->set('item_num', -1);
        } else {
            $items = $im->getItemInfoWithKeyword($this->af->get('search'));
            $this->af->set('items', $items);
            $this->af->set('item_num', count($items));
        }
    }
}

