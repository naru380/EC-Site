<?php
/**
 *  Admin/Shop/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  admin_shop_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_AdminShopDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'name' => array(
            'type'      => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXT,
            'required'  => true,
        ),
        'price' => array(
            'type'      => VAR_TYPE_INT,
            'form_type' => FORM_TYPE_TEXT,
            'required'  => true,
        ),
        'description' => array(
            'type'      => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXTAREA,
            'required'  => true,
        ),
        'image' => array(
            'form_type' => FORM_TYPE_FILE,
            'required'  => false,
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
 *  admin_shop_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_AdminShopDo extends Sample_AdminActionClass
{
    /**
     *  preprocess of admin_shop_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'admin_shop';
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
     *  admin_shop_do action implementation.
     *
     *  @access public
     *  4@return string  forward name.
     */
    public function perform()
    {
        $im = new Sample_ItemManager();

        $name = $this->af->get('name');
        $price = $this->af->get('price');
        $description = $this->af->get('description');

        $id = $im->addItem($name, $price, $description);
        $item = $im->getItemInfoWithId($id);
        
        if ($_FILES != null) {
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);

             if(! move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/rockwave/www/images/{$id}.{$ext}")) {
                 $im->deleteItem($id);
                return 'admin_shop';
             }
            $im->editItem($id, $item['name'], $item['price'], $item['description'], "{$id}.jpg");
        }

        $this->af->set('message', '商品を追加しました');

        return 'admin_index';
    }
}
