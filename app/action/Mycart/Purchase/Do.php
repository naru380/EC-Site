<?php
/**
 *  Mycart/Purchase/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  mycart_purchase_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_MycartPurchaseDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
            'name' => array(
                'type'      => VAR_TYPE_STRING,
                'form_type' => FORM_TYPE_TEXT,
            ),
            'address' => array(
                'type'      => VAR_TYPE_STRING,
                'form_type' => FORM_TYPE_TEXT,
            ),
            'mycart_purchase_do' => array(
                'form_type' => FORM_TYPE_HIDDEN,
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
 *  mycart_purchase_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_MycartPurchaseDo extends Sample_AuthActionClass
{
    /**
     *  preprocess of mycart_purchase_do Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            return 'mycart_purchase';
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
     *  mycart_purchase_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        $id = $this->session->get('id');
        $address = $this->af->get('address');

        $mm = new Sample_MycartManager();
        $items = $mm->getMycart($id);
        $check = 0;
        foreach ($items as $item) {
            $check += $item['price'] * $item['num']; 
        }

        $um = new Sample_UserManager();
        $user = $um->getUserInfo($id);

        $to = $user['mail_address'];
        $toname= $this->af->get('name');

        $subject= '通販サイトのご利用ありがとうございます';

        $ethna_mail =& new Ethna_MailSender($this->backend);
        $mail_var = array('username' => $toname, 'address' => $address, 'items' => $items, 'check' => $check);

        $body = $ethna_mail->send(null, 'purchase.tpl', $mail_var);

        $mail = new Sample_MailManager();
        $mail->sendMail($to, $toname, $subject, $body);

        $mm->removeItem($this->session->get('id'), 0);

        return 'mycart_purchase_do';
    }
}
