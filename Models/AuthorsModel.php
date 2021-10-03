<?php


namespace Models;

use Models\Model;

class AuthorsModel extends Model
{
    public function getAllAuthors()
    {
        return $this->dbContext->query('SELECT `id`, `FullName`, `DateOfDeath`,`DateOfBirth`,`AuthorBiography`,`PlaceOfBirth` FROM `authors`');
    }

    public function SaveAuthor($fullname,$authorBiography,$dateOfBirth,$dateOfDeath,$placeOfBirth)
    {
        $query = "INSERT INTO `authors` (FullName, AuthorBiography, DateOfBirth, DateOfDeath, PlaceOfBirth) values ('$fullname', '$authorBiography', '$dateOfBirth','$dateOfDeath', '$placeOfBirth')";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function SaveEdit($idAuthor, $fullname, $authorBiography, $dateOfBirth, $dateOfDeath,$placeOfBirth)
    {
        $query = "UPDATE `authors` SET `FullName` = '$fullname', `AuthorBiography` = '$authorBiography', `DateOfBirth` = '$dateOfBirth', `DateOfDeath` = '$dateOfDeath', `PlaceOfBirth` = '$placeOfBirth' WHERE `id` = '$idAuthor'";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }

    public function Delete($idAuthor)
    {
        $query = "DELETE FROM `authors` WHERE `id` = $idAuthor";
        mysqli_query($this->dbContext, $query) or die("Error in query to database");
    }
}