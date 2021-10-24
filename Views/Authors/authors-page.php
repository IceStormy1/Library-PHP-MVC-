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
<?php
    }
?>
<form action="/authors/edit" class="test" method="post">
    <div class="tableMain">
        <table border="1" width="90%">
            <col style="width:0%">
            <col style="width:15%">
            <col style="width:5%">
            <col style="width:5%">
            <col style="width:5%">
            <col style="width:70%">

            <th>ID Author</th>
            <th>Fullname</th>
            <th>DateOfBirth</th>
            <th>DateOfDeath</th>
            <th>PlaceOfBirth</th>
            <th>AuthorBiography</th>
            <?php
            foreach ($params['authorsResult'] as $rowAuthors) {
                ?>
                <tr>
                    <td><?= $rowAuthors['id'] ?></td>
                    <td><?= $rowAuthors['FullName'] ?></td>
                    <td><?= $rowAuthors['DateOfBirth'] ?></td>
                    <td><?= $rowAuthors['DateOfDeath'] ?></td>
                    <td><?= $rowAuthors['PlaceOfBirth'] ?></td>
                    <td><?= $rowAuthors['AuthorBiography'] ?></td>
                    <?php if(array_key_exists("user", $_SESSION) && $_SESSION['user']['IdRole'] == 1) { ?>
                    <td><button value="<?= $rowAuthors['id']  ?>" type="submit" name="id">Edit</button></td>
                    <td><button value="<?= $rowAuthors['id']  ?>" type="submit" name="id" formaction="/authors/delete">Delete</button></td>
                </tr>
            <?php
                }
            } ?>
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
