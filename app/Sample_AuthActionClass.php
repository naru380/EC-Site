<?php

class Sample_AuthActionClass extends Sample_ActionClass
{
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

        if (! $this->session->isStart())
        {
            return 'login';
        }

        return parent::authenticate();
    }

    public function prepare()
    {
        return parent::prepare();
    }

    public function perform()
    {
        return parent::perform();
    }
}
