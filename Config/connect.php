<?php
namespace Config;

class  connect
{
    static public function Connect()
    {
        $serverName = "localhost";
        $database = "digitaldatabase";
        $username = "mysql";
        $password = "";

        $connection = mysqli_connect($serverName, $username, $password, $database);

        if (!$connection)
        {
            die("Connection failed." . mysqli_connect_error());
        }

        return $connection;
    }
}
//echo "Connected succesfully";