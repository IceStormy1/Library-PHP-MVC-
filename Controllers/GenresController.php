<?php

namespace Controllers;

use Controllers\AbstractController;

class GenresController extends AbstractController
{
    public function genresMain(): void
    {
        $genresResult = $this->model->getAllGenres();

        $params = [
            'genresResult' => $genresResult,
        ];

        $this->render('genres-page', $params);
    }

    public function genresSave(): void
    {
        if (isset($_POST)) {
            $genre = $_POST['Genre'];
            $this->model->SaveGenre($genre);

            header("Location: http://librarynew/genres/");
        }
    }

    public function genresEdit():void
    {
        if (isset($_POST)) {
            $genresResult = $this->model->getAllGenres();
            $idGenre = $_POST['id'];
            $params = [
                'idEdit'=>$idGenre,
                'genresResult' => $genresResult,
            ];

            $this->render('edit-genres-page', $params);
        }
    }

    public function genresSaveEdit(): void
    {
        if(isset($_POST))
        {
            $idGenre = $_POST['id'];
            $genre = $_POST['Genre'];

            $this->model->SaveEdit($idGenre, $genre);

            header("Location: http://librarynew/genres");
        }
    }

    public  function genresDelete():void
    {
        if (isset($_POST)) {
            $idBook = $_POST['id'];
            $this->model->Delete($idBook);

            header("Location: http://librarynew/genres");
        }
    }

    public function Delete($idGenre)
    {
        $query = "DELETE FROM `bookgenres` WHERE `id` = $idGenre";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }
}