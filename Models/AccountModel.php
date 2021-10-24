<?php

namespace Models;

use Models\Model;
use mysql_xdevapi\Exception;

class AccountModel extends Model
{
    public function CreateUser(string $username, string $password, string $confirmPassword, string $email)
    {
        if(empty($username) or empty($password) or empty($email))
        {
            $_SESSION['EmptyFields'] = "The fields are empty. Please, check the entered data";
            header("Location: http://librarynew/registration");
            return;
        }

        if (!($password === $confirmPassword || strlen($password) < 6))
        {
            $_SESSION['PasswordDontMatch'] = 'Check your password';
            header("Location: http://librarynew/registration");
            return;
        }

        $idUser = $this->CreateGuid();
        $dateOfCreate = date('Y-m-d');
        $passwordHash = md5($password);
        $result = $this->dbContext->query("INSERT INTO `users` (IdUser, UserName, Password, Email, DateOfCreate) values ('$idUser', '$username', '$passwordHash','$email', '$dateOfCreate')");

        if ($result)
        {
            $_SESSION['SuccessRegistration'] = 'Congratulations! You have successfully registered. Now you can log in to your account';
            header("Location: http://librarynew/login");
        }
        else
        {
            $_SESSION['ExceptionCreateUser'] = 'Such a user already exists';
            header("Location: http://librarynew/registration");
        }
    }

    public function Authorize(string $username, string $password): bool
    {
        $query = $this->dbContext->query("SELECT * FROM `users` WHERE (UserName = '$username' OR Email = '$username') AND Password = '$password'");

        if ($query->num_rows == 1)
        {
            $user = $query->fetch_assoc();
            //добавить флажок Запомнить меня
            $_SESSION['user'] = [
                "IdUser" => $user['IdUser'],
                "UserName"=>$user['UserName'],
                "Email"=>$user['Email'],
                "IdRole"=>$user['IdRole']
            ];
            
            //$userSerialize = serialize($_SESSION['user']); //
            //setcookie('user', $userSerialize, time() + 3600); // проверить это все

            header("Location: http://librarynew/");
        }
        else
        {
            $_SESSION['AuthorizeError'] = 'Invalid username or password. Try again';
            header("Location: http://librarynew/login");
            return false;
        }

        return true;
    }

    private function CreateGuid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}