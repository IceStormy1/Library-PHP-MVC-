<?php

namespace Controllers;

use Controllers\AbstractController;

class QueriesController extends AbstractController
{
    public function queriesMain(): void
    {
        $authorResult = $this->model->getAllAuthors();
        $booksResult = $this->model->getAllBooks();

        $params = [
            'authorResult' => $authorResult,
            'booksResult' => $booksResult
        ];

        $this->render('queries-page', $params);
    }

    public function queriesFilter():void
    {
        if (isset($_POST)) {
            $idAuthor = $_POST['idAuthor'];
            $authorResult = $this->model->getAllAuthors();
            $booksFilter = $this->model->filterBooks($idAuthor);

            $params = [
                'authorResult' => $authorResult,
                'booksFilter' => $booksFilter
            ];

            $this->render('filter-queries-page', $params);
        }
    }
}