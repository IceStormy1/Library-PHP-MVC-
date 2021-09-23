<?php

namespace Models;

use Config\connect;

abstract class Model
{
    protected $dbContext;

    public function __construct()
    {
        $this->dbContext = connect::Connect();
    }
}