<?php


namespace Models;

use Models\Model;
use R;

class AuthorsModel extends Model
{
    public function getAllAuthors()
    {
        return $this->dbContext->query('SELECT `id`, `full_name`, `date_of_death`,`date_of_birth`,`author_biography`,`place_of_birth` FROM `authors`');
    }

    public function SaveAuthor($fullname,$authorBiography,$dateOfBirth,$dateOfDeath,$placeOfBirth)
    {
//        $query = "INSERT INTO `authors` (FullName, AuthorBiography, DateOfBirth, DateOfDeath, PlaceOfBirth) values ('$fullname', '$authorBiography', '$dateOfBirth','$dateOfDeath', '$placeOfBirth')";
//        mysqli_query($this->dbContext, $query) or die("Error in query to database");

        $authorr = R::dispense('authors');

        $authorr->full_name=$fullname;
        $authorr->author_biography = $authorBiography;
        $authorr->date_of_birth = $dateOfBirth;
        $authorr->date_of_death = $dateOfDeath;
        $authorr->place_of_birth = $placeOfBirth;

        R::store($authorr);
    }

    public function SaveEdit($idAuthor, $fullname, $authorBiography, $dateOfBirth, $dateOfDeath,$placeOfBirth)
    {
//        $query = "UPDATE `authors` SET `full_name` = '$fullname', `author_biography` = '$authorBiography', `date_of_birth` = '$dateOfBirth', `date_of_death` = '$dateOfDeath', `place_of_birth` = '$placeOfBirth' WHERE `id` = '$idAuthor'";
//        mysqli_query($this->dbContext, $query) or die("Error in query to database");

        $author = R::load('authors', $idAuthor);
        $author->full_name=$fullname;
        $author->author_biography = $authorBiography;
        $author->date_of_birth = $dateOfBirth;
        $author->date_of_death = $dateOfDeath;
        $author->place_of_birth = $placeOfBirth;

        R::store($author);
    }

    public function Delete($idAuthor)
    {
//        $query = "DELETE FROM `authors` WHERE `id` = $idAuthor";
//        mysqli_query($this->dbContext, $query) or die("Error in query to database");

        $author = R::load('authors', $idAuthor);
        R::trash($author);
    }
}