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
                    <form class="createUserForm">
                        <p>Name: </p>
                        <input type="text" id="name" placeholder="Enter name" required>
                        <p>Email:</p>
                        <input type="email" id="email" placeholder="Enter email" required>
                        <p>Password:</p>
                        <input type="password" id="pwd" placeholder="Enter Password" required>
                        <p>Conform Password: </p>
                        <input type="password" name="confirmpwd" placeholder="Re enter Password" required>
                        <input type="submit" name="" value="Sign In">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('createUserForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('pwd').value;
            const confirmPwd = document.getElementById('confirmPwd').value;

            if (password !== confirmPwd) {
                alert("Passwords do not match!");
                return;
            }

            fetch('http://localhost/library_management_system/backend/router.php/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    values: `"${name}", "${email}", "${password}"`
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
</body>
</html>