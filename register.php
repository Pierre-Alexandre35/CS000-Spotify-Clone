<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $currentAccount = new Account($conn);
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValues($value){
        if(isset($_POST[$value])){
            echo $_POST[$value];
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./assets/register.css">
    <title>Welcome to Spotify</title>
</head>

<body>
    <div id="background">
        <div id="login-container">
            <div id="input-container">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $currentAccount->getError(Constants::$loginFail);?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" type="text" name="loginUsername" value="<?php getInputValues('loginUsername')?>" placeholder="e.g Tom Don" "required>
            </p>
            <p>
                <label for=" loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" type="password" required>
                    </p>

                    <button type="submit" name="loginButton">Log In</button>
                    <div class="hasAccountCheck">
                        <a class="noAccountLink" href="#"><span class="hideLoggin">Don't Have An Account Yet? Sign Up
                                Here</span></a>
                    </div>
                </form>
                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create Your Free Account</h2>
                    <p>
                        <?php echo $currentAccount->getError(Constants::$usernameSize); ?>
                        <?php echo $currentAccount->getError(Constants::$usernameExists); ?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" placeholder="e.g Tom Don"
                            value="<?php getInputValues('username') ?>" required>
                    </p>

                    <p>
                        <?php echo $currentAccount->getError(Constants::$firstNameSize); ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g Tom"
                            value="<?php getInputValues('firstName') ?>" required>
                    </p>

                    <p>
                        <?php echo $currentAccount->getError(Constants::$lastNameSize); ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g Simpsons"
                            value="<?php getInputValues('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $currentAccount->getError(Constants::$emailMistchMatch); ?>
                        <?php echo $currentAccount->getError(Constants::$emailInvalid); ?>
                        <?php echo $currentAccount->getError(Constants::$emailExists); ?>

                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="e.g b.simpsons@boston.com"
                            value="<?php getInputValues('email') ?>" required>
                    </p>
                    <p>
                        <label for="emailConfirm">Confirm Your Email</label>
                        <input id="emailConfirm" name="emailConfirm" type="email"
                            value="<?php getInputValues('emailConfirm') ?>" placeholder="e.g b.simpsons@boston.com"
                            required>
                    </p>
                    <p>
                        <?php echo $currentAccount->getError(Constants::$passwordMissMatch); ?>
                        <?php echo $currentAccount->getError(Constants::$passwordMissCharacters); ?>
                        <?php echo $currentAccount->getError(Constants:: $passwordSize); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" value="<?php getInputValues('password') ?>"
                            required>
                    </p>
                    <p>
                        <label for="passwordConfirm">Confirm Your Password</label>
                        <input id="passwordConfirm" name="passwordConfirm" type="password"
                            value="<?php getInputValues('passwordConfirm') ?>" required>
                    </p>
                    <button id="registerButton" type="submit" name="registerButton">Register</button>
                    <div class="hasAccountCheck">
                        <a class="alreadyAccountLink" href="#"><span class="hideLoggin">Already Have An Account Yet?
                                Sign In Here</span></a>
                    </div>
                </form>
            </div>
            <div id="loginText">
                <h1>Get Great Music, Right Now!</h1>
                <h2>Listen To Loads Of Songs For Free</h2>
                <ul>
                    <li>Discover More Than 30,000 Songs</li>
                    <li>Only $9.99 Per Month</li>
                    <li>Available On Mobile</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="assets/scripts/register.js"></script>

</body>

</html>