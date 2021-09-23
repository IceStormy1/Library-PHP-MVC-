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
        return $this->dbContext->query('SELECT `books`.`id`, `books`.`Description`, `books`.`YearOfWriting`, `books`.`BookTitle`, `authors`.`FullName`, `bookgenres`.`Genre` FROM `authors` INNER JOIN `books` ON `authors`.`id` = `books`.`idAuthor` INNER JOIN `bookgenres` ON `bookgenres`.`id` = `books`.`idGenre`');
    }

    public function SaveEntry(string $Title, string $Description, string $Date, int $idAuthor, int $idGenre)
    {
        $query = "INSERT INTO `books` (BookTitle, Description, idAuthor, idGenre, YearOfWriting) values ('$Title', '$Description', '$idAuthor','$idGenre', '$Date')";
        $result = mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }
}