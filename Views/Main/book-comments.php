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

<form action="/saveComment" class="test" method="post">
    <h1>Comments on the book <?= $params['BookTitle'] ?>:</h1>
    <?php if($params['commentBooks']->num_rows < 1) echo "<h3> Be the first comment </h3>"; ?>
    <?php
        foreach ($params['commentBooks'] as $comment){
            ?>
            <p><?= $comment['UserName']?></p>
            <p><?= $comment['Comment'] ?></p>
            <?php
                if((array_key_exists("user", $_SESSION) && $_SESSION['user']['IdUser'] == $comment['IdUser']) || $_SESSION['user']['IdRole'] == 1){ ?>
                    <button value="<?= $comment['idComment'] ?>" type="submit" name="idComment" formaction="/deleteComment">Delete</button>
             <?php
                }
            ?>
            <hr>
       <?php
        }
    ?>
    <?php if(array_key_exists("user", $_SESSION) && ($_SESSION['user']['IdRole'] == 1 || $_SESSION['user']['IdRole'] == 2)) { ?>
    <h2>Share your opinion: </h2>
    <textarea name="commentUser" id="" cols="100" rows="10"></textarea>
    <input type="hidden" name="idBook" value="<?= $params['idBook']  ?>">
    <br><br><input type="submit" value="Send">
    <?php } ?>
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
