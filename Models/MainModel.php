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
        return $this->dbContext->query('SELECT `id`, `FullName` FROM `authors`');
    }

    public function getAllBooks()
    {
        return $this->dbContext->query('SELECT `books`.`id`, `books`.`Description`, `books`.`YearOfWriting`, `books`.`BookTitle`, `authors`.`FullName`, `bookgenres`.`Genre`, `books`.`idAuthor`, `books`.`idGenre` FROM `authors` INNER JOIN `books` ON `authors`.`id` = `books`.`idAuthor` INNER JOIN `bookgenres` ON `bookgenres`.`id` = `books`.`idGenre`');
    }

    public function SaveEntry(string $Title, string $Description, string $Date, int $idAuthor, int $idGenre)
    {
        $query = "INSERT INTO `books` (BookTitle, Description, idAuthor, idGenre, YearOfWriting) values ('$Title', '$Description', '$idAuthor','$idGenre', '$Date')";
        $result = mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function SaveEdit(int $id, int $idGenre, int $idAuthor, string $bookTitle, string $description, string $yearOfWriting)
    {
        $query = "UPDATE books SET `books`.`BookTitle` = '$bookTitle',`books`.`Description` = '$description', `books`.`YearOfWriting` = '$yearOfWriting', `books`.`idAuthor` = '$idAuthor', `books`.`idGenre` = '$idGenre'  WHERE `books`.`id` = '$id'";
        $result = mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function Delete(int $id)
    {
        $query = "DELETE FROM `books` WHERE `id` = $id ";
        $result = mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }
}