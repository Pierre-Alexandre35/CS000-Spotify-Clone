<?php
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");
    include("includes/classes/Account.php");

?>

<html>
<head>
    <title>Welcome to Spotify</title>
</head>

<body>
    <div id="input-container">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" type="text" name="loginUsername" placeholder="e.g Tom Don" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="text id=" loginPassword" name="loginPassword" type="password" required>
            </p>
            
            <button type="submit" name="loginButton">Log In</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create Your Free Account</h2>
            <p>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="e.g Tom Don" required>
            </p>

            <p>
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" placeholder="e.g Tom" required>
            </p>

            <p>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" placeholder="e.g Simpsons" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="e.g b.simpsons@boston.com" required>
            </p>
            <p>
                <label for="emailConfirm">Confirm Your Email</label>
                <input id="emailConfirm" name="emailConfirm" type="emailConfirm" placeholder="e.g b.simpsons@boston.com" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </p>
            <p>
                <label for="passwordConfirm">Confirm Your Password</label>
                <input id="passwordConfirm" name="passwordConfirm" type="password" required>
            </p>
            <button type="submit" name="registerButton">Register</button>
        </form>
    </div>
</body>

</html>