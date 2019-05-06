<?php
/**
 *  Change/Password/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  change_password_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ChangePasswordDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
            'new_password' => array(
                'name'          => 'パスワード',
                'type'          => VAR_TYPE_STRING,
                'form_type'     => FORM_TYPE_PASSWORD,
                'required'      => true,
            ),
            'confirm_password' => array(
                'name'          => 'パスワード',
                'type'          => VAR_TYPE_STRING,
                'form_type'     => FORM_TYPE_PASSWORD,
                'required'      => true,
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
 *  change_password_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ChangePasswordDo extends Sample_ActionClass
{
    /**
     *  preprocess of change_password_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'change_password';
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
     *  change_password_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $um = new Sample_UserManager();
        $id = $this->session->get('id');
        $password = $this->af->get('password');
        $new_password = $this->af->get('new_password');
        $confirm_password = $this->af->get('confirm_password');

        if ($new_password !== $confirm_password) {
            $this->ae->addObject('confirm_password', Ethna::raiseNotice('パスワードが一致しません', null));
            return 'change_password';
        }

        $result = $um->changePassword($id, $new_password, $password);
        
        if (Ethna::isError($result)) {
            $this->ae->addObject('password', $result);
            return 'change_password';
        }

        return 'mypage';
    }
}
