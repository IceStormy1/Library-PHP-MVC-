<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Главная страница</title>
    <link rel="stylesheet" href="/css/style.css"/>
    <meta http-equiv="Content-Type"/>
</head>
<body>
<!-- Header -->
<div class="header">
    <div class="header_section">
        <div class="header_item headerlogo">
            <a href="/">RPD</a>
        </div>
        <div class="header_item headerButton">
            <a href="/">Home</a>
        </div>
        <div class="header_item headerButton">
            <a href="/genres">Genres</a>
        </div>
        <div class="header_item headerButton">
            <a href="/authors">Authors</a>
        </div>
        <div class="header_item headerButton">
            <a href="/queries">Queries</a>
        </div>
    </div>
    <div class="header_section">
        <?php
        if(array_key_exists("user", $_SESSION)){ ?>
            <div class="header_item headerButton">
                <a href="#"><?=$_SESSION['user']['UserName'] ?> </a>
            </div>
            <div class="header_item headerButton">
                <a href="/logout"> Logout </a>
            </div>
       <?php
        }else{ ?>
            <div class="header_item headerButton">
                <a href="/login"> Sign in </a>
            </div>
      <?php
        }
        ?>
    </div>
</div>
<!-- End Header -->
<?php
    if(array_key_exists("user", $_SESSION) && $_SESSION['user']['IdRole'] == 1){  ?>
        <form action="/save" method="POST" enctype="multipart/form-data" id="test">
            <div class="second_header_section">
                <label>
                    <input maxlength="75" name="BookTitle" placeholder="Book Title"/>
                </label>
                <label>
                    <input maxlength="255" name="Description" placeholder="Description"/>
                </label>
                <label>
                    <input maxlength="10" name="YearOfWriting" placeholder="Year of Writing"/>
                </label>

                <label>
                    <select name="idGenre">
                        <option value="0">Select genre</option>
                        <?php
                        foreach ($params['genresResult'] as $row) {
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['Genre'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
                <label>
                    <select name="idAuthor">
                        <option value="0">Select author</option>
                        <?php
                        foreach ($params['authorResult'] as $row) {
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['full_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
                <input type="submit" value="Save">
            </div>
        </form>
 <?php
    }
?>

<form action="/edit" class="test" method="post">
    <button value="1" type="submit" name="idTest" formaction="/bookTest">3 question</button>
    <button value="2" type="submit" name="idTest" formaction="/bookTest">5 question</button>

    <div class="tableMain">
    <table border="1" width="70%">
        <col style="width:0%">
        <col style="width:10%">
        <col style="width:60%">
        <col style="width:10%">
        <col style="width:20%">

        <th>ID Book</th>
        <th>Title of the book</th>
        <th>Description</th>
        <th>Date of Write</th>
        <th>Author</th>
        <th>Genre</th>
        <?php
        foreach ($params['booksResult'] as $rowBook) { ?>
            <tr>
                <td><?= $rowBook['id'] ?></td>
                <td><?= $rowBook['book_title'] ?></td>
                <td><?= $rowBook['description'] ?></td>
                <td><?= $rowBook['year_of_writing'] ?></td>
                <td><?= $rowBook['full_name'] ?></td>
                <td><?= $rowBook['Genre'] ?></td>
                <td><button value="<?= $rowBook['id']  ?>" type="submit" name="id" formaction="/comments">Comment</button></td>
                <?php if(array_key_exists("user", $_SESSION) && $_SESSION['user']['IdRole'] == 1) { ?>
                <td><button value="<?= $rowBook['id']  ?>" type="submit" name="id">Edit</button></td>
                <td><button value="<?= $rowBook['id']  ?>" type="submit" name="id" formaction="/delete">Delete</button></td>
            </tr>
        <?php }
        } ?>
    </table>
</div>
</form>
    <table border="1" width="20%">
        <col style="width:70%">
        <col style="width:30%">

        <th>Genre</th>
        <th>Count Books</th>

        <?php

            foreach ($params['countBooks'] as $key => $value){ ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php } ?>
    </table>

<form action="/findBook" method="post">
    <br><br><br>
    <label>
        <input maxlength="100" name="findBooksKey" placeholder="Search book by book title"/>
    </label>
    <input type="submit" value="Search">
    <?php
        if(array_key_exists("FindBooks", $_SESSION)) { ?>
    <br><br>
    <div class="tableMain">
        <table border="1" width="70%">
            <col style="width:0%">
            <col style="width:10%">
            <col style="width:60%">
            <col style="width:10%">


            <th>ID Book</th>
            <th>Title of the book</th>
            <th>Description</th>
            <th>Date of Write</th>
                <tr>
                <td><?= $_SESSION['FindBooks']['id'] ?></td>
                <td><?= $_SESSION['FindBooks']['book_title'] ?></td>
                <td><?= $_SESSION['FindBooks']['description'] ?></td>
                <td><?= $_SESSION['FindBooks']['year_of_writing'] ?></td>
<?php
        unset($_SESSION['FindBooks']);
        }
?>
</form>
<br>
<p>1820-01-01 - 1837-01-01</p>
<table border="1" width="20%">
    <col style="width:70%">
    <col style="width:30%">

    <th>Book Title</th>
    <th>Year of Writing</th>

    <?php
    foreach ($params['latestBooks'] as $rowCount){ ?>
        <tr>
            <td><?= $rowCount['book_title'] ?></td>
            <td><?= $rowCount['year_of_writing'] ?></td>
        </tr>
    <?php } ?>
</table>

<footer>
    <div class="footer">
        <div class="footer_section">
            The work was completed &copy; Tolmachev М.Е VIS-32
        </div>
    </div>
</footer>

</body>
</html>
