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
        <div class="header_item headerButton">
            <a href="#"> Settings </a>
        </div>
        <div class="header_item headerButton">
            <a href="#"> Sign in </a>
        </div>
    </div>
</div>
<!-- End Header -->

<form action="/genres/save" method="POST" enctype="multipart/form-data" id="test">
    <div class="second_header_section">
        <label>
            <input maxlength="75" name="Genre" placeholder="Genre"/>
        </label>
        <input type="submit" value="Save">
    </div>
</form>

<form action="/genres/edit" class="test" method="post">
    <div class="tableMain">
        <table border="1" width="40%">
            <col style="width:10%">
            <col style="width:90%">

            <th>ID Genre</th>
            <th>Genre</th>
            <?php
            foreach ($params['genresResult'] as $rowGenres) {
                ?>
                <tr>
                    <td><?= $rowGenres['id'] ?></td>
                    <td><?= $rowGenres['Genre'] ?></td>
                    <td><button value="<?= $rowGenres['id']  ?>" type="submit" name="id">Edit</button></td>
                    <td><button value="<?= $rowGenres['id']  ?>" type="submit" name="id" formaction="/genres/delete">Delete</button></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</form>

<footer>
    <div class="footer">
        <div class="footer_section">
            The work was completed &copy; Толмачев М.Е ВИС32
        </div>
    </div>
</footer>

</body>
</html>
