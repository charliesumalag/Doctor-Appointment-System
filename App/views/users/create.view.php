<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/register.css">
    <title>Patient Registration</title>
</head>

<body>
    <div class="wrapper">
        <main class="main">
            <h1>Let's Get Started</h1>
            <p class="par-text">Create User Account</p>
            <form class="form" action="/createaccount" method="POST">
                <div class="input-container">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="input-container">
                    <label for="">Mobile Number</label>
                    <input type="text" name="mobilenumber">
                </div>
                <div class="input-container">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-container">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirmpassword">
                </div>
                <div class="button-container">
                    <button type="reset">Reset</button>
                    <button type="submit" class="next">Signup</button>
                </div>
            </form>
            <p class="already">Already have an Account? <a href="/login"><span>Login</span></a></p>
        </main>
    </div>
</body>

</html>
