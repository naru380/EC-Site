<?php
/**
 *  Item.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  item view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_Item extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $im = new Sample_ItemManager();
        $item = $im->getItemInfoWithId($this->af->get('item_id'));
        $im->addView($this->af->get('item_id'));

        $this->af->set('item', $item);
    }
}

