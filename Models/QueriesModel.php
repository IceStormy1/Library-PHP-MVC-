<?php

namespace Models;

use Models\Model;

class QueriesModel extends Model
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

    public function filterBooks($idAuthor)
    {
        return $this->dbContext->query("SELECT `books`.`id`, `books`.`Description`, `books`.`YearOfWriting`, `books`.`BookTitle`, `authors`.`FullName`, `bookgenres`.`Genre`, `books`.`idAuthor`, `books`.`idGenre` FROM `authors` INNER JOIN `books` ON `authors`.`id` = `books`.`idAuthor` AND `books`.`idAuthor` = $idAuthor INNER JOIN `bookgenres` ON `bookgenres`.`id` = `books`.`idGenre`");
    }
}