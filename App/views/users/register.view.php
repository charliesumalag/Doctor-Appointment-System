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
            <p class="par-text">Enter Personal Details to Continue</p>
            <form class="form" action="/signup" method="POST">
                <div class="input-container">
                    <label for="">Name</label>
                    <div class="input-name-container">
                        <input type="text" name="firstname" placeholder="First">
                        <input type="text" name="lastname" placeholder="Last">
                    </div>
                </div>
                <div class="input-container">
                    <label for="">Address</label>
                    <input type="text" name="address">
                </div>
                <div class="input-container">
                    <label for="">NIC Number</label>
                    <input type="text" name="nicnumber">
                </div>
                <div class="input-container">
                    <label for="">Date of Birth</label>
                    <input type="date" name="dateofbirth">
                </div>
                <div class="button-container">
                    <button type="reset">Reset</button>
                    <button type="submit" class="next">Next</button>
                </div>
            </form>
            <p class="already">Already have an Account? <a href="/login"><span>Login</span></a></p>
        </main>
    </div>
</body>

</html>
