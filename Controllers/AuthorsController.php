<?php

namespace Controllers;

use Controllers\AbstractController;

class AuthorsController extends AbstractController
{
    public function authorsMain(): void
    {
        $authorsResult = $this->model->getAllAuthors();

        $params = [
            'authorsResult' => $authorsResult,
        ];

        $this->render('authors-page', $params);
    }

    public function authorsSave(): void
    {
        if (isset($_POST)) {
            $fullname = $_POST['FullName'];
            $authorBiography = $_POST['AuthorBiography'];
            $dateOfBirth = $_POST['DateOfBirth'];
            $dateOfDeath = $_POST['DateOfDeath'];
            $placeOfBirth = $_POST['PlaceOfBirth'];

            $this->model->SaveAuthor($fullname,$authorBiography,$dateOfBirth,$dateOfDeath,$placeOfBirth);


            header("Location: http://librarynew/authors/");
        }
    }

    public function authorsEdit(): void
    {
        if (isset($_POST)) {
            $authorsResult = $this->model->getAllAuthors();
            $idAuthor = $_POST['id'];
            $params = [
                'idEdit' => $idAuthor,
                'authorsResult' => $authorsResult,
            ];

            $this->render('edit-authors-page', $params);
        }
    }

    public function authorsSaveEdit(): void
    {
        if (isset($_POST)) {
            $idAuthor = $_POST['id'];
            $fullname = $_POST['FullName'];
            $authorBiography = $_POST['AuthorBiography'];
            $dateOfBirth = $_POST['DateOfBirth'];
            $dateOfDeath = $_POST['DateOfDeath'];
            $placeOfBirth = $_POST['PlaceOfBirth'];

            $this->model->SaveEdit($idAuthor, $fullname, $authorBiography, $dateOfBirth, $dateOfDeath, $placeOfBirth);

            header("Location: http://librarynew/authors");
        }
    }

    public function authorsDelete(): void
    {
        if (isset($_POST)) {
            $idAuthor = $_POST['id'];
            echo $idAuthor;
            $this->model->Delete($idAuthor);

            header("Location: http://librarynew/authors");
        }
    }
}