<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>

<body>
    <div class="box">
        <span class="borderLine"></span>
        <form action="proses/proses_login.php" method="POST">
            <h2>Log in</h2>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</body>

</html>