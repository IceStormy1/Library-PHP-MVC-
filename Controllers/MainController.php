<?php
namespace Controllers;
use Controllers\AbstractController;


class MainController extends AbstractController
{
    public function mainPage(): void
    {
        $genresResult = mysqli_query($this->dbContext,'select `id`, `Genre` from `bookgenres`');
        $authorResult = mysqli_query($this->dbContext,'select `id`, `FullName` from `authors`');

        $params = [
            'genresResult'=>$genresResult,
            'authorResult'=>$authorResult
        ];
        $this->render('main-page', $params);
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