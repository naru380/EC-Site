<?php

class Sample_AdminActionClass extends Sample_ActionClass
{
    public function authenticate()
    {
        if (! $this->session->isStart())
        {
            $this->session->start();
        }


        if (strcmp($this->session->get('mode'), 'admin'))
        {
            return 'index';
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
