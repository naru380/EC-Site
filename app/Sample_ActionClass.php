<?php
// vim: foldmethod=marker
/**
 *  Sample_ActionClass.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

// {{{ Sample_ActionClass
/**
 *  action execution class
 *
 *  @author     {$author}
 *  @package    Sample
 *  @access     public
 */
class Sample_ActionClass extends Ethna_ActionClass
{
    /**
     *  authenticate before executing action.
     *
     *  @access public
     *  @return string  Forward name.
     *                  (null if no errors. false if we have something wrong.)
     */
    public function authenticate()
    {
        /*
        // セッションが開始されていない場合は開始する
        if (! $this->session->isStart())
        {
            $this->session->start();
        }
        
        // ログイン状態を確認し、未認証の場合あログイン画面に繊維する
        // 認証はsessionアレイにuserというハッシュ値が登録されているかで判定する
        $user = $this->session->get('user');
        if (! is_array($user))
        {
            return 'login';
        }
        */

        return parent::authenticate();
    }

    /**
     *  Preparation for executing action. (Form input check, etc.)
     *
     *  @access public
     *  @return string  Forward name.
     *                  (null if no errors. false if we have something wrong.)
     */
    public function prepare()
    {
        return parent::prepare();
    }

    /**
     *  execute action.
     *
     *  @access public
     *  @return string  Forward name.
     *                  (we does not forward if returns null.)
     */
    public function perform()
    {
        return parent::perform();
    }
}
// }}}

