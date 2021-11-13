<?php

namespace Sessions_Ex_3;

use \Sessions_Ex_3\Session;

class Flash extends Session
{
    public function setMessage(string $key, $value) : void
    {
        $this->CreateSessionByKey($key, $value);
    }

    public function getMessage(string $key) : string
    {
        if(Session::CheckSessionValueByKey($key))
        {
            return Session::GetSessionValueByKey($key);
        }

        return "";
    }
}