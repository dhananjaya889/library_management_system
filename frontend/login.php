<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="image">

        <?php

        include("header.html");

        ?>

        <div class="title">
            <h1>Log In</h1>
        </div>
        <div class="container">
            <div class="left"></div>
            <div class="right">
                <div class="formBox">
                    <form>
                        <p>Username or Email: </p>
                        <input type="text" name="" placeholder="Enter username or email">
                        <p>Password: </p>
                        <input type="password" name=""  placeholder="Enter Password">
                        <input type="submit" name="" value="Login">
                        <a href="#">Foget password? </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>