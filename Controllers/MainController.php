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

    public function edit(): void
    {
        if (isset($_POST)) {
            $genresResult = $this->model->getAllGenres();
            $authorResult = $this->model->getAllAuthors();
            $booksResult = $this->model->getAllBooks();
            $idEdit = $_POST['id'];

            $params = [
                'genresResult' => $genresResult,
                'authorResult' => $authorResult,
                'booksResult' => $booksResult,
                'idEdit' => $idEdit
            ];

            $this->render('edit-main-page', $params);
        }
    }

    public function saveEdit(): void
    {
        if (isset($_POST)) {
            $idBook = $_POST['id'];
            $bookTitle = $_POST['BookTitle'];
            $Description = $_POST['Description'];
            $Date = $_POST['YearOfWriting'];
            $idGenre = $_POST['idGenre'];
            $idAuthor = $_POST['idAuthor'];

            $this->model->SaveEdit($idBook, $idGenre, $idAuthor, $bookTitle, $Description, $Date);

            header("Location: http://librarynew/");
        }
    }

    public function delete(): void
    {
        if (isset($_POST)) {
            $idBook = $_POST['id'];

            $this->model->Delete($idBook);

            header("Location: http://librarynew/");
        }
    }
}