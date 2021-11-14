<?php

namespace Models;

use Config\connect;
use R;

abstract class Model
{
    protected $dbContext;

    public function __construct()
    {
        $this->dbContext = connect::Connect();
        R::setup("mysql:host=127.0.0.1;dbname=digitaldatabase", "mysql", "");

        if(!R::testConnection())
        {
            exit('No connection');
        }
    }

    protected function CreateGuid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}