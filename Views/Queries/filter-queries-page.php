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
            <a href="/login"> Sign in </a>
        </div>
    </div>
</div>
<!-- End Header -->

<form action="/queries/filter" method="POST" enctype="multipart/form-data" id="test">
    <div class="second_header_section">
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
        <input type="submit" value="Filter">
    </div>
</form>

<form action="/edit" class="test" method="post">
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
            foreach ($params['booksFilter'] as $rowBook) {
                ?>
                <tr>
                    <td><?= $rowBook['id'] ?></td>
                    <td><?= $rowBook['BookTitle'] ?></td>
                    <td><?= $rowBook['Description'] ?></td>
                    <td><?= $rowBook['YearOfWriting'] ?></td>
                    <td><?= $rowBook['FullName'] ?></td>
                    <td><?= $rowBook['Genre'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
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
