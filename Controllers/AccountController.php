<?php

namespace Controllers;

use Controllers\AbstractController;

class AccountController extends AbstractController
{
    public function login(): void
    {
        if (!empty($_POST)) {
            $username = $_POST['Username'];
            $password = md5($_POST['Password']);

            $this->model->Authorize($username, $password);

            return;
        }

        $this->render('pageLogin');


    }

    public function registration(): void
    {
        if (!empty($_POST)) {
            $username = $_POST['Username'];
            $password = md5($_POST['Password']);
            $confirmPassword = md5($_POST['ConfirmPassword']);
            $email = $_POST['Email'];
            $this->model->CreateUser($username, $password, $confirmPassword, $email);

            return;
        }

        $this->render('pageRegistration');
    }
}