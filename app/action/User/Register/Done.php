<?php
/**
 *  User/Register/Done.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  user_register_done Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_UserRegisterDone extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
            'uniqid' => array(
                'required'  => true,
            ),
            'id' => array(
                'type'  => VAR_TYPE_INT,
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
 *  user_register_done action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_UserRegisterDone extends Sample_ActionClass
{
    /**
     *  preprocess of user_register_done Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
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
     *  user_register_done action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        if (!Ethna_Util::isDuplicatePost() ) {
            return 'index';
        }

        $id = $this->af->get('id');
        echo $id;

        $um = new Sample_UserManager();
        $result = $um->register($id);

        if (Ethna::isError($result)) {
            return 'index';
        }

        //$user_info = $um->getUserInfo($this->af->get('id'));
        /*
        if (Ethna::isError($user_info)) {
            $this->ae->addObject('mail_address', $result);
            return 'user_register';
        }
        */

        $this->session->start();
        $this->session->set('auth', 'ok');
        $this->session->set('id', $id);

        return 'user_register_done';
        //return 'index';
    }
}
