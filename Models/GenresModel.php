<?php

namespace Models;

use Models\Model;

class GenresModel extends Model
{
    public function getAllGenres()
    {
        return $this->dbContext->query('SELECT `id`, `Genre` FROM `bookgenres`');
    }

    public function SaveGenre($genre)
    {
        $query = "INSERT INTO `bookgenres` (Genre) values ('$genre')";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function SaveEdit($idGenre, $genre)
    {
        $query = "UPDATE `bookgenres` SET `Genre` = '$genre'  WHERE `id` = '$idGenre'";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function Delete($idGenre)
    {
        $query = "DELETE FROM `bookgenres` WHERE `id` = $idGenre";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }
}