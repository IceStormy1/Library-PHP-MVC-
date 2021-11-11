<?php

namespace Sessions_Ex_3;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function CreateSessionByKey (string $key, string $message) : void
    {
        $_SESSION[$key] = $message;
    }

    public static function DeleteSessionByKey(string $key) : void
    {
        unset($_SESSION[$key]);
    }

    public static function GetSessionValueByKey(string $key): string
    {
        return $_SESSION[$key];
    }

    public static function CheckSessionValueByKey(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }
}