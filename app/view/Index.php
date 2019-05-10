<?php
/**
 *  Index.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  Index view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_Index extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $im = new Sample_ItemManager();
        $items = $im->getMostViewItems(3);
        
        $this->af->set('most_viewed_items', $items);
    }
}

