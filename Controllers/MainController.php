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
        $countBooks = $this->model->GetCountBooks();
        $LatestBooks = $this->model->GetLatestBooks();

        $params = [
            'genresResult' => $genresResult,
            'authorResult' => $authorResult,
            'booksResult' => $booksResult,
            'countBooks' => $countBooks,
            'latestBooks' => $LatestBooks
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

    public function comments(): void
    {
        if (isset($_POST)) {
            $idBook = $_POST['id'];
            $bookComments = $this->model->GetAllCommentsByIdBook($idBook);

            $params = [
                'commentBooks' => $bookComments,
                'BookTitle' => $this->model->GetBookById($idBook)->fetch_array()['BookTitle'] ?? null,
                'idBook' => $idBook
            ];

            $this->render('book-comments', $params);
        }
    }

    public function saveComment(): void
    {
        if (isset($_POST)) {
            $comment = $_POST['commentUser'];
            $idUser = $_SESSION['user']['IdUser'];
            $idBook = $_POST['idBook'];

            $this->model->SaveComment($idUser, $idBook, $comment);

            header("Location: http://librarynew/");
        }
    }

    public function deleteComment(): void
    {
        if (isset($_POST)) {
            $this->model->DeleteComment($_POST['idComment']);
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

    public function bookTest(): void
    {
        if (isset($_POST)) {
            $idTest = $_POST['idTest'];

            if ($idTest == 1) {
                $params = [
                    "idTest" => $idTest,
                    'Quetion№1' => 'Q1',
                    'Quetion№2' => 'Q2',
                    'Quetion№3' => 'Q3',
                ];
            } else {
                $params = [
                    "idTest" => $idTest,
                    'Quetion№1' => 'Q1',
                    'Quetion№2' => 'Q2',
                    'Quetion№3' => 'Q3',
                    'Quetion№4' => 'Q4',
                    'Quetion№5' => 'Q5',
                ];

                $_SESSION['Answer'] = [
                    'Q1' => 1,
                    'Q2' => 3,
                    'Q3' => 1,
                    'Q4' => 2,
                    'Q5' => 2,
                ];
            }

            $this->render('pageTest', $params);

            return;
        }

        $this->render('pageTest');
    }

    public function saveTest(): void
    {
        if (isset($_POST)) {
            if (count($_POST) == 3) {
                $firstAnswer = $_POST['answer1'];
                $secondAnswer = $_POST['answer2'];
                $thirdAnswer = $_POST['answer3'];

                $_SESSION['RightAnswers'] = 0;
                $_SESSION['RightAnswers'] = $firstAnswer == $_SESSION['Answer']["Q1"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;
                $_SESSION['RightAnswers'] = $secondAnswer == $_SESSION['Answer']["Q2"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;
                $_SESSION['RightAnswers'] = $thirdAnswer == $_SESSION['Answer']["Q3"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;


                if ($_SESSION['RightAnswers'] == 0) {
                    $_SESSION['PercentCorrectAnswers'] = 0;
                    $this->render('pageTest', $params = [
                        "idTest" => 1,
                        'Quetion№1' => 'Q1',
                        'Quetion№2' => 'Q2',
                        'Quetion№3' => 'Q3',
                        'Quetion№4' => 'Q4',
                        'Quetion№5' => 'Q5',
                    ]);

                    return;
                }

                $_SESSION['PercentCorrectAnswers'] = $_SESSION['RightAnswers'] / 3 * 100;

                $this->render('pageTest', $params = [
                    "idTest" => 1,
                    'Quetion№1' => 'Q1',
                    'Quetion№2' => 'Q2',
                    'Quetion№3' => 'Q3',
                    'Quetion№4' => 'Q4',
                    'Quetion№5' => 'Q5',
                ]);
            }else{
                $firstAnswer = $_POST['answer1'];
                $secondAnswer = $_POST['answer2'];
                $thirdAnswer = $_POST['answer3'];
                $fourthAnswer = $_POST['answer4'];
                $fifthAnswer = $_POST['answer5'];

                $_SESSION['RightAnswers'] = 0;
                $_SESSION['RightAnswers'] = $firstAnswer == $_SESSION['Answer']["Q1"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;
                $_SESSION['RightAnswers'] = $secondAnswer == $_SESSION['Answer']["Q2"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;
                $_SESSION['RightAnswers'] = $thirdAnswer == $_SESSION['Answer']["Q3"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;
                $_SESSION['RightAnswers'] = $fourthAnswer == $_SESSION['Answer']["Q4"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;
                $_SESSION['RightAnswers'] = $fifthAnswer == $_SESSION['Answer']["Q5"] ? $_SESSION['RightAnswers'] += 1 : $_SESSION['RightAnswers'] += 0;

                if ($_SESSION['RightAnswers'] == 0) {
                    $_SESSION['PercentCorrectAnswers'] = 0;
                    $this->render('pageTest', $params = [
                        "idTest" => 1,
                        'Quetion№1' => 'Q1',
                        'Quetion№2' => 'Q2',
                        'Quetion№3' => 'Q3',
                        'Quetion№4' => 'Q4',
                        'Quetion№5' => 'Q5',
                    ]);

                    return;
                }

                $_SESSION['PercentCorrectAnswers'] = $_SESSION['RightAnswers'] / 5 * 100;

                $this->render('pageTest', $params = [
                    "idTest" => 2,
                    'Quetion№1' => 'Q1',
                    'Quetion№2' => 'Q2',
                    'Quetion№3' => 'Q3',
                    'Quetion№4' => 'Q4',
                    'Quetion№5' => 'Q5',
                ]);
            }
        }
    }

    public function findBook()
    {
        $key = $_POST['findBooksKey'];
        $result = $this->model->FindBooksByKey($key);

        foreach ($result as $value)
        {
            $_SESSION['FindBooks'] = [
                'id' => $value->id,
                'description' => $value->description,
                'book_title' => $value->book_title,
                'year_of_writing' => $value->year_of_writing,
                'id_author' => $value->id_author,
                'id_genre' => $value->id_genre
            ];
        }

        header("Location: http://librarynew/");

    }
}