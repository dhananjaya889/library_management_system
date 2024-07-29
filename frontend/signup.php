<?php

    require_once __DIR__."../backend/models/User.php";

    $user = new User();

    $result = $user->getAll();
    
?>

<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="image">

        <?php

        include ("header.html");

        ?>

        <div class="title">
            <h1>Sign up</h1>
        </div>
        <div class="container">
            <div class="left"></div>
            <div class="right">
                <div class="formBox">
                    <form>
                        <p>Name: </p>
                        <input type="text" name="" placeholder="Enter name">
                        <p>Email:</p>
                        <input type="email" name="" placeholder="Enter email">
                        <p>Password:</p>
                        <input type="password" name="" placeholder="Enter Password">
                        <p>Conform Password: </p>
                        <input type="password" name="" placeholder="Re enter Password">
                        <input type="submit" name="" value="Sign In">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>