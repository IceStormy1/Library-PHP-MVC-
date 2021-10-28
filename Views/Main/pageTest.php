<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Главная страница</title>
    <link rel="stylesheet" href="/css/style.css"/>
    <meta http-equiv="Content-Type"/>
</head>
<body>
<!-- Header -->
<?php
if (!array_key_exists("user", $_SESSION)) {
    header("Location: http://librarynew/");
}
?>
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
        if (array_key_exists("user", $_SESSION)) { ?>
            <div class="header_item headerButton">
                <a href="#"><?= $_SESSION['user']['UserName'] ?> </a>
            </div>
            <div class="header_item headerButton">
                <a href="/logout"> Logout </a>
            </div>
            <?php
        } else { ?>
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
if (array_key_exists("user", $_SESSION) && $_SESSION['user']['IdRole'] == 1) { ?>
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
                        <option value="<?= $row['id'] ?>"><?= $row['FullName'] ?></option>
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

<?php
if (array_key_exists("idTest", $params))
{ ?>
<form action="/saveTest" method="POST" enctype="multipart/form-data">
    <?php if ($params['idTest'] == 1) {
        echo '<p>' . $params['Quetion№1'] . '</p>';
        echo '<p><input name="answer1" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer1" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer1" type="radio" value="3">answer3</p>';

        echo '<p>' . $params['Quetion№2'] . '</p>';
        echo '<p><input name="answer2" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer2" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer2" type="radio" value="3">answer3</p>';

        echo '<p>' . $params['Quetion№3'] . '</p>';
        echo '<p><input name="answer3" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer3" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer3" type="radio" value="3">answer3</p>';
    } else {
        echo '<p>' . $params['Quetion№1'] . '</p>';
        echo '<p><input name="answer1" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer1" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer1" type="radio" value="3">answer3</p>';

        echo '<p>' . $params['Quetion№2'] . '</p>';
        echo '<p><input name="answer2" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer2" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer2" type="radio" value="3">answer3</p>';

        echo '<p>' . $params['Quetion№3'] . '</p>';
        echo '<p><input name="answer3" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer3" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer3" type="radio" value="3">answer3</p>';

        echo '<p>' . $params['Quetion№4'] . '</p>';
        echo '<p><input name="answer4" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer4" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer4" type="radio" value="3">answer3</p>';

        echo '<p>' . $params['Quetion№5'] . '</p>';
        echo '<p><input name="answer5" type="radio" value="1">answer1</p>';
        echo '<p><input name="answer5" type="radio" value="2">answer2</p>';
        echo '<p><input name="answer5" type="radio" value="3">answer3</p>';
    }
    }
    if (array_key_exists("RightAnswers", $_SESSION) && array_key_exists("PercentCorrectAnswers", $_SESSION)) {
        echo '<p class="message"> Count right answers: ' . $_SESSION['RightAnswers'] . ' Percentage of correct answers: ' . $_SESSION['PercentCorrectAnswers'].'%' . '</p>';
        unset($_SESSION['RightAnswers']);
        unset($_SESSION['PercentCorrectAnswers']);
    }
    ?>


    <input type="submit" value="Save">
</form>


<footer>
    <div class="footer">
        <div class="footer_section">
            The work was completed &copy; Tolmachev М.Е VIS-32
        </div>
    </div>
</footer>

</body>
</html>
