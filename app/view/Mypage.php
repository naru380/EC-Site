<?php
/**
 *  Mypage.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  mypage view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_Mypage extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        $um = new Sample_UserManager();
        $user_info = $um->getUserInfo($this->session->get('id'));

        /*
        $this->af->set('name', $user_info['name']);
        $this->af->set('mail_address', $user_info['mail_address']);
        $this->af->set('password', $user_info['password']);
        */

        $this->af->set('user', $user_info);
    }
}

