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
            $this->sessions->CreateSessionByKey("EmptyFields", "The fields are empty. Please, check the entered data");
            header("Location: http://librarynew/registration");

            return;
        }

        if (!($password === $confirmPassword))
        {
            $this->sessions->CreateSessionByKey("PasswordDontMatch", "Passwords mismatch"); ;
            header("Location: http://librarynew/registration");

            return;
        }

        $query = $this->dbContext->query("SELECT * FROM `users` WHERE UserName = '$username' OR Email = '$email'");

        if($query->num_rows >= 1)
        {
            $this->sessions->CreateSessionByKey("ExceptionCreateUser", "Such a user already exists");
            header("Location: http://librarynew/registration");

            return;
        }

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
            $this->sessions->CreateSessionByKey("PasswordDontMatch", "Password must contain at least 1 digit, 1 capital latin letter");
            header("Location: http://librarynew/registration");

            return;
        }

        $idUser = $this->CreateGuid();
        $dateOfCreate = date('Y-m-d');
        $passwordHash = md5($password);
        $result = $this->dbContext->query("INSERT INTO `users` (IdUser, UserName, Password, Email, DateOfCreate) values ('$idUser', '$username', '$passwordHash','$email', '$dateOfCreate')");

        if ($result)
        {
            $this->sessions->CreateSessionByKey("SuccessRegistration", "Congratulations! You have successfully registered. Now you can log in to your account");
            header("Location: http://librarynew/login");
        }
    }

    public function Authorize(string $username, string $password, bool $isRemember)
    {
        $query = $this->dbContext->query("SELECT * FROM `users` WHERE (UserName = '$username' OR Email = '$username') AND Password = '$password'");

        if ($query->num_rows == 1)
        {
            $user = $query->fetch_assoc();

            $_SESSION['user'] = [
                "IdUser" => $user['IdUser'],
                "UserName"=>$user['UserName'],
                "Email"=>$user['Email'],
                "IdRole"=>$user['IdRole']
            ];

            header("Location: http://librarynew/");
        }
        else
        {
            $_SESSION['AuthorizeError'] = 'Invalid username or password. Try again';
            header("Location: http://librarynew/login");
        }
    }
}