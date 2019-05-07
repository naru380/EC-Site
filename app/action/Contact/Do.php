<?php
/**
 *  Contact/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  contact_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ContactDo extends Sample_ActionForm
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
            'mail_address' => array(
                'name'          => 'メールアドレス',
                'type'          => VAR_TYPE_STRING,
                'form_type'     => FORM_TYPE_TEXT,
                'required'      => true,
            ),
            'content' => array(
                'name'          => 'お問い合わせ内容',
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
 *  contact_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ContactDo extends Sample_ActionClass
{
    /**
     *  preprocess of contact_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'contact';
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
     *  contact_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $mm = new Sample_MailManager();
        $from = $this->af->get('mail_address');
        $fromname= $this->af->get('name');
        $to = 'ec.sample.0510@gmail.com';
        $toname= '通販サイト';
        $subject = 'お問い合わせ';
        $content = $this->af->get('content');

        $ethna_mail =& new Ethna_MailSender($this->backend);
        $mail_var = array('username' => $fromname, 'mail_address' => $from, 'content' => $content);

        $body = $ethna_mail->send(null, 'contact.tpl', $mail_var);

        $mail = new Sample_MailManager();
        $mail->sendMail($to, $toname, $subject, $body);

        return 'contact_do';
    }
}
