<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Главная страница</title>
    <link rel="stylesheet" href="/css/style.css"/>
    <meta http-equiv="Content-Type"/>
</head>
<body>
<?php
if(!array_key_exists("user", $_SESSION) && $_SESSION['user']['IdRole'] != 2){
    header("Location: http://librarynew/authors");
}
?>
<form>
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
    <div id="test_t">
        <form action="/authors/save" method="POST" enctype="multipart/form-data" id="test">
            <div class="second_header_section">
                <label>
                    <input maxlength="75" name="FullName" placeholder="FullName"/>
                </label>
                <label>
                    <input maxlength="75" name="DateOfBirth" placeholder="DateOfBirth"/>
                </label>
                <label>
                    <input maxlength="75" name="DateOfDeath" placeholder="DateOfDeath"/>
                </label>
                <label>
                    <input maxlength="75" name="PlaceOfBirth" placeholder="PlaceOfBirth"/>
                </label>
                <label>
                    <input maxlength="75" name="AuthorBiography" placeholder="AuthorBiography"/>
                </label>
                <input type="submit" value="Save">
            </div>
        </form>
</div>

<div class="tableMain">
    <form action="/authors/editsave" method="POST" enctype="multipart/form-data">
        <table border="1" width="90%">
            <col style="width:0%">
            <col style="width:15%">
            <col style="width:5%">
            <col style="width:5%">
            <col style="width:5%">
            <col style="width:70%">

            <th>ID Book</th>
            <th>FullName</th>
            <th>DateOfBirth</th>
            <th>DateOfDeath</th>
            <th>PlaceOfBirth</th>
            <th>AuthorBiography</th>
            <?php
            foreach ($params['authorsResult'] as $rowAuthor) {
                ?>
                <tr>
                    <?php if ($params['idEdit'] == $rowAuthor['id']) {
                        ?>
                        <td>
                            <label>
                                <input type="text" readonly value="<?= $rowAuthor['id'] ?>" name="id">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="text" value="<?= $rowAuthor['FullName'] ?>" name="FullName">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="text" value="<?= $rowAuthor['DateOfBirth'] ?>" name="DateOfBirth">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="text" value="<?= $rowAuthor['DateOfDeath'] ?>" name="DateOfDeath">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="text" value="<?= $rowAuthor['PlaceOfBirth'] ?>" name="PlaceOfBirth">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input type="text" value="<?= $rowAuthor['AuthorBiography'] ?>" name="AuthorBiography">
                            </label>
                        </td>

                        <label>
                            <input type="hidden" value="<?= $rowAuthor['id'] ?>" name="idAuthor">
                        </label>
                        <td>
                            <button value="<?= $rowAuthor['id']  ?>" type="submit" name="id">Save</button>
                        </td>


                    <?php } else { ?>
                        <td><?= $rowAuthor['id'] ?></td>
                        <td><?= $rowAuthor['FullName'] ?></td>
                        <td><?= $rowAuthor['DateOfBirth'] ?></td>
                        <td><?= $rowAuthor['DateOfDeath'] ?></td>
                        <td><?= $rowAuthor['PlaceOfBirth'] ?></td>
                        <td><?= $rowAuthor['AuthorBiography'] ?></td>
                    <?php } ?>
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
