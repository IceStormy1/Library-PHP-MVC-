<?php

namespace Models;

use Models\Model;

class MainModel extends Model
{
    public function getAllGenres()
    {
        return $this->dbContext->query('SELECT `id`, `Genre` FROM `bookgenres`');
    }

    public function getAllAuthors()
    {
        return $this->dbContext->query('SELECT `id`, `Full_Name` FROM `authors`');
    }

    public function getAllBooks()
    {
        return $this->dbContext->query('SELECT `books`.`id`, `books`.`Description`, `books`.`Year_Of_Writing`, `books`.`Book_Title`, `authors`.`Full_Name`, `bookgenres`.`Genre`, `books`.`idAuthor`, `books`.`idGenre` FROM `authors` INNER JOIN `books` ON `authors`.`id` = `books`.`idAuthor` INNER JOIN `bookgenres` ON `bookgenres`.`id` = `books`.`idGenre`');
    }

    public function SaveEntry(string $Title, string $Description, string $Date, int $idAuthor, int $idGenre)
    {
        $query = "INSERT INTO `books` (BookTitle, Description, idAuthor, idGenre, Year_Of_Writing) values ('$Title', '$Description', '$idAuthor','$idGenre', '$Date')";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function SaveEdit(int $id, int $idGenre, int $idAuthor, string $bookTitle, string $description, string $yearOfWriting)
    {
        $query = "UPDATE books SET `books`.`BookTitle` = '$bookTitle',`books`.`Description` = '$description', `books`.`YearOfWriting` = '$yearOfWriting', `books`.`idAuthor` = '$idAuthor', `books`.`idGenre` = '$idGenre'  WHERE `books`.`id` = '$id'";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function Delete(int $id)
    {
        $query = "DELETE FROM `books` WHERE `id` = $id ";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function GetAllCommentsByIdBook(int $idBook)
    {
        return $this->dbContext->query("SELECT `books`.`BookTitle`, `books`.`id`, `usercomments`.`Comment`, `users`.`UserName`, `users`.`IdUser`, `usercomments`.`idComment` FROM `books` INNER JOIN usercomments ON `usercomments`.`IdBook` = `books`.`id` INNER JOIN `users` ON `usercomments`.`IdUser` = `users`.`IdUser` WHERE `books`.`id` = $idBook");
    }

    public function GetBookById(int $idbook)
    {
        return $this->dbContext->query("SELECT `books`.BookTitle FROM `books` WHERE `books`.`id` = $idbook");
    }

    public function SaveComment(string $idUser, int $idBook, string $comment)
    {
        $idComment = $this->CreateGuid();
        $query = "INSERT INTO `usercomments` (`idComment`,`IdUser`, `IdBook`, `Comment`) VALUES ('$idComment','$idUser', $idBook, '$comment');";

        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function DeleteComment(string $idComment)
    {
        $query = "DELETE FROM `usercomments` WHERE `idComment` = '$idComment' ";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }
}