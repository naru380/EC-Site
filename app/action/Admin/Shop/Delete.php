<?php
/**
 *  Admin/Shop/Delete.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  admin_shop_delete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_AdminShopDelete extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
            'item_id' => array(
                'type'      => VAR_TYPE_INT,
                'form_type' => FORM_TYPE_HIDDEN,
                'required'  => true,
            ),
       /*
        *  TODO: Write form definition which this action uses.
        *  @see http://ethna.jp/ethna-document-dev_guide-form.html
        *
        *  Example(You can omit all elements except for "type" one) :
        *
        *  'sample' => array(
        *      // Form definition
        *      'type'        => VAR_TYPE_INT,    // Input type
        *      'form_type'   => FORM_TYPE_TEXT,  // Form type
        *      'name'        => 'Sample',        // Display name
        *
        *      //  Validator (executes Validator by written order.)
        *      'required'    => true,            // Required Option(true/false)
        *      'min'         => null,            // Minimum value
        *      'max'         => null,            // Maximum value
        *      'regexp'      => null,            // String by Regexp
        *
        *      //  Filter
        *      'filter'      => 'sample',        // Optional Input filter to convert input
        *      'custom'      => null,            // Optional method name which
        *                                        // is defined in this(parent) class.
        *  ),
        */
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  admin_shop_delete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_AdminShopDelete extends Sample_AdminActionClass
{
    /**
     *  preprocess of admin_shop_delete Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'item';
        }
        /**
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'error';
        }
        $sample = $this->af->get('sample');
        */
        return null;
    }

    /**
     *  admin_shop_delete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $im = new Sample_ItemManager();
        $item_id = $this->af->get('item_id');
        $item = $im->getItemInfoWithId($item_id);

        $im->deleteItem($item_id);

        if($item['image'] != null) {
            unlink("/var/www/rockwave/www/images/{$item['image']}");
        }

        $this->af->set('message', '商品を削除しました');

        return 'admin_index';
    }
}
