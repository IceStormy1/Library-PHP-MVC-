<?php

namespace Models;

use Config\connect;
use Sessions_Ex_3\Session;

abstract class Model
{
    protected $dbContext;
    protected $sessions;

    public function __construct()
    {
        $this->dbContext = connect::Connect();
        $this->sessions =  new Session;
    }

    protected function CreateGuid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}