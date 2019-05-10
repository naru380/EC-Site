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


        //move_uploaded_file($this->af->get('image'), 'aaa');
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            //if (move_uploaded_file($_FILES['image']['tmp_name'], './aaa.jpg') ) {
            //    echo "成功";
            //}
        } else {
            echo "失敗";
        }

        //echo $this->af->get('image');
        //$this->af->set('image');


        return 'admin_shop';
    }
}
