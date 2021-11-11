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
if(\Sessions_Ex_3\Session::CheckSessionValueByKey('user')){
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
        <div class="header_item headerButton">
            <a href="#"> Settings </a>
        </div>
        <div class="header_item headerButton">
            <a href="/login"> Sign in </a>
        </div>
    </div>
</div>
<!-- End Header -->

<?php
if(\Sessions_Ex_3\Session::CheckSessionValueByKey('SuccessRegistration'))
{
    echo '<p class="success">' . \Sessions_Ex_3\Session::GetSessionValueByKey('SuccessRegistration') . '</p>';
    \Sessions_Ex_3\Session::DeleteSessionByKey('SuccessRegistration');
}
?>

<form action="" method="POST" class="accountForm">
    <label>
        Username or Email
    </label>
    <input class="accountInput" type="text" name="Username">
    <label>
        Password
    </label>
    <input class="accountInput" type="password" name="Password">
    <button class = "AccountButton" type="submit">Log in</button>
    <label>
        <input class="accountCheckBox" type="checkbox" name="IsRemember"  /> Remember me
    </label>
    <p>
        No account? <a href="/registration" id="acc">Register here</a>
    </p>
    <?php
    if(\Sessions_Ex_3\Session::CheckSessionValueByKey('AuthorizeError'))
    {
        echo '<p class="message">' . \Sessions_Ex_3\Session::GetSessionValueByKey('AuthorizeError') . '</p>';
        \Sessions_Ex_3\Session::DeleteSessionByKey('AuthorizeError');
    }
    ?>
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
