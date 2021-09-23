<?php

namespace Controllers;

use Controllers\AbstractController;

class MainController extends AbstractController
{
    public function mainPage(): void
    {
        $genresResult = $this->model->getAllGenres();
        $authorResult = $this->model->getAllAuthors();
        $booksResult = $this->model->getAllBooks();

        $params = [
            'genresResult' => $genresResult,
            'authorResult' => $authorResult,
            'booksResult' => $booksResult
        ];

        $this->render('main-page', $params);
    }

    public function save(): void
    {
        if (isset($_POST)) {
            $Title = $_POST['BookTitle'];
            $Description = $_POST['Description'];
            $Date = $_POST['YearOfWriting'];
            $idGenre = $_POST['idGenre'];
            $idAuthor = $_POST['idAuthor'];

            $this->model->SaveEntry($Title, $Description, $Date, $idAuthor, $idGenre);

            header("Location: http://librarynew/");

        }
    }

    public function edit():void
    {
        if(isset($_POST))
        {
            echo $_POST['id'];
            $genresResult = $this->model->getAllGenres();
            $authorResult = $this->model->getAllAuthors();
            $booksResult = $this->model->getAllBooks();

            $params = [
                'genresResult' => $genresResult,
                'authorResult' => $authorResult,
                'booksResult' => $booksResult
            ];

            $this->render('edit-main-page', $params);
        }
    }
}