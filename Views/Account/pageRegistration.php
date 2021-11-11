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

<form action="" method="POST" class="accountForm">
    <label>
        Username
    </label>
    <input class="accountInput" type="" name="Username" maxlength="64" placeholder="Enter your username for log in an account">
    <label>
        Password (Min 6 symbols)
    </label>
    <input class="accountInput" type="password" name="Password" maxlength="64" placeholder="Enter your password">
    <label>
        Confirm your password
    </label>
    <input class="accountInput" type="password" name="ConfirmPassword" maxlength="64" placeholder="Confirm your password">
    <label>
        Email
    </label>
    <input class="accountInput" type="email" name="Email" maxlength="128" placeholder="Enter your Email">
    <button class = "AccountButton" type="submit">Registration</button>
    <p>
        Already have an account? <a href="/login" id="acc">Sign in</a>
    </p>
    <?php
    if(\Sessions_Ex_3\Session::CheckSessionValueByKey('PasswordDontMatch'))
    {
        echo '<p class="message">' . \Sessions_Ex_3\Session::GetSessionValueByKey('PasswordDontMatch') . '</p>';
        \Sessions_Ex_3\Session::DeleteSessionByKey('PasswordDontMatch');
    }
    elseif (\Sessions_Ex_3\Session::CheckSessionValueByKey('ExceptionCreateUser'))
    {
        echo '<p class="message">' . \Sessions_Ex_3\Session::GetSessionValueByKey('ExceptionCreateUser') . '</p>';
        \Sessions_Ex_3\Session::DeleteSessionByKey('ExceptionCreateUser');
    }
    elseif(\Sessions_Ex_3\Session::CheckSessionValueByKey('ExceptionCreateUser'))
    {
        echo '<p class="message">' . \Sessions_Ex_3\Session::GetSessionValueByKey('EmptyFields') . '</p>';
        \Sessions_Ex_3\Session::DeleteSessionByKey('EmptyFields');
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
