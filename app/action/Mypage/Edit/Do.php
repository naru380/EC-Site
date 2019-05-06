<?php
/**
 *  Mypage/Edit/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  mypage_edit_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_MypageEditDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
            'name' => array(
                'name'          => '名前',
                'type'          => VAR_TYPE_STRING,
                'form_type'     => FORM_TYPE_TEXT,
                'required'      => true,
            ),
            'address' => array(
                'name'          => '住所',
                'type'          => VAR_TYPE_STRING,
                'form_type'     => FORM_TYPE_TEXT,
                'required'      => false,
            ),
            'password' => array(
                'name'          => 'パスワード',
                'type'          => VAR_TYPE_STRING,
                'form_type'     => FORM_TYPE_PASSWORD,
                'required'      => true,
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
 *  mypage_edit_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_MypageEditDo extends Sample_AuthActionClass
{
    /**
     *  preprocess of mypage_edit_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'mypage_edit';
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
     *  mypage_edit_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $um = new Sample_UserManager();
        $id = $this->session->get('id');
        $name = $this->af->get('name');
        $address= $this->af->get('address');
        $password= $this->af->get('password');

        $result = $um->editInfo($id, $name, $address, $password);

        if (Ethna::isError($result)) {
            $this->ae->addObject('password', $result);
            return 'mypage_edit';
        }

        return 'mypage';
    }
}
