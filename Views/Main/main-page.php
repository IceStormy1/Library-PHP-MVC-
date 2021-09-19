<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Главная страница</title>
    <link rel="stylesheet" href="/css/style.css" />
    <meta http-equiv="Content-Type" />
</head>
<body>
<!-- Header -->
<div class="header">
    <div class="header_section">
        <div class="header_item headerlogo">
            <a href="/">RPD</a>
        </div>
        <div class="header_item headerButton">
            <a href="/">Главная</a>
        </div>
        <div class="header_item headerButton">
            <a href="#">Books</a>
        </div>
        <div class="header_item headerButton">
            <a href="#">Genres</a>
        </div>
        <div class="header_item headerButton">
            <a href="#">Authors</a>
        </div>
    </div>
    <div class="header_section">
        <div class="header_item headerButton">
            <a href="#"> Settings </a>
        </div>
        <div class="header_item headerButton">
            <a href="#"> Sign in </a>
        </div>
    </div>
</div>

<!-- End Header -->

<form action="/save" method="POST" enctype="multipart/form-data">
    <div class="second_header_section">
        <label>
            <input maxlength="75" name="Title" />
        </label>
        <label>
            <input maxlength="255" name="Description" />
        </label>
        <label>
            <input maxlength="8" name="Date" />
        </label>

        <label>
            <select name="idGenre">
                <option value="0">Выберите жанр</option>
                <?php
                while($row = mysqli_fetch_assoc($genresResult)){
                    ?>
                    <option value="<?=$row['id']?>"><?=$row['Genre']?></option>
                    <?php
                }
                ?>
            </select>
        </label>
        <label>
            <select name="idAuthor">
                <option value="0">Выберите Автора</option>
                <?php
                while($row = mysqli_fetch_assoc($authorResult)){
                    ?>
                    <option value="<?=$row['id']?>"><?=$row['FullName']?></option>
                    <?php
                }
                ?>
            </select>
        </label>
<input type="submit">
    </div>
</form>

<footer>
    <div class="footer">
        <div class="footer_section">
            Работу выполнил &copy; Толмачев М.Е ВИС32
        </div>
    </div>
</footer>

</body>
</html>
