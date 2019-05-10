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
        $most_viewed_items = $im->getMostViewItems(3);
        $recently_added_items = $im->getRecentlyAddItems(3);
        
        $this->af->set('most_viewed_items', $most_viewed_items);
        $this->af->set('recently_added_items', $recently_added_items);
    }
}

