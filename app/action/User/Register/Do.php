<?php
/**
 *  User/Register/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  user_register_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_UserRegisterDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'name' => [
            'name'      => '名前',
            'required'  => true,
            'type'      => VAR_TYPE_STRING,
        ],
        'mail_address' => [
            'name'      => 'メールアドレス',
            'required'  => true,
            'type'      => VAR_TYPE_STRING,
        ],
        'password' => [
            'name'      => 'パスワード',
            'required'  => true,
            'type'      => VAR_TYPE_STRING,
        ],
        'uniqid' => [
            'name'      => 'ユニークID',
            'form_type' => FORM_TYPE_HIDDEN,
        ],
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
 *  user_register_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_UserRegisterDo extends Sample_ActionClass
{
    /**
     *  preprocess of user_register_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'user_register';
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
     *  user_register_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        if (Ethna_Util::isDuplicatePost()) {
            return 'user_register_do';
        }

        $um = new Sample_UserManager();
        //$result = $um->register($this->af->get('name'), $this->af->get('mail_address'), $this->af->get('password'));

        if (Ethna::isError($result)) {
            $this->ae->addObject('mail_address', $result);
            return 'user_register';
        }

        $to = $this->af->get('mail_address');
        $toname= $this->af->get('name');
        $subject= '通販サイトにご登録ありがとうございます';
        $url = 'http://localhost/?action_user_register_done=true&uniqid=' . $this->af->get('uniqid');

        $ethna_mail =& new Ethna_MailSender($this->backend);
        $mail_var = array('username' => $toname, 'url' => $url);

        $body = $ethna_mail->send(null, 'user_register.tpl', $mail_var);

        $mail = new Sample_MailManager();
        $mail->sendMail($to, $toname, $subject, $body);

        /*
        $this->session->start();
        $this->session->set('auth', 'ok');
        $this->session->set('mail_address', $this->af->get('mail_address'));
        */

        return 'user_register_do';
    }
}
