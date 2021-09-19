<?php
namespace Controllers;
use Controllers\AbstractController;


class MainController extends AbstractController
{
    public function mainPage(): void
    {
        $this->render('main-page');
    }

    public function save():void
    {
        if(isset($_POST))
        {
            echo $_POST['idGenre']."<br>";
            echo $_POST['idAuthor'];

header("Location: http://librarynew/");

        }
    }
}