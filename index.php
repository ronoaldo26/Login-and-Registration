<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration Form</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="login_registration_style.css">
    </head>
    <body>
        <?php
        if(!isset($_SESSION['error_register']) || empty($_SESSION['error_register']))
        {
            $_SESSION['error_register'] = array(                
                "first_name" => array("border_color" => "black", "text_color" => "rgb(38, 164, 163)", "text_message" => "no error"), 
                "last_name" => array("border_color" => "black", "text_color" => "rgb(38, 164, 163)", "text_message" => "no error"), 
                "email" => array("border_color" => "black", "text_color" => "rgb(38, 164, 163)", "text_message" => "no error"), 
                "password" => array("border_color" => "black", "text_color" => "rgb(38, 164, 163)", "text_message" => "no error"), 
                "confirm_password" => array("border_color" => "black", "text_color" => "rgb(38, 164, 163)", "text_message" => "no error")
            );
        }
        if(!isset($_SESSION['error_login']) || empty($_SESSION['error_login']))
        {
            $_SESSION['error_login'] = array(
                "email" => array("border_color" => "black", "text_color" => "rgb(245, 124, 36)", "text_message" => "no error"),
                "password" => array("border_color" => "black", "text_color" => "rgb(245, 124, 36)", "text_message" => "no error")
            );
        }

        if(!isset($_SESSION['data_register']) || empty($_SESSION['data_register']))
        {
            $_SESSION['data_register'] = array(
                "first_name" => "", 
                "last_name" => "", 
                "email" => ""
            );
        }
        if(!isset($_SESSION['data_login']) || empty($_SESSION['data_login']))
        {
            $_SESSION['data_login'] = "";
        }

        ?>
        <div class="container">
            <form action="process.php" method="post" id="process_register">
                <h2>Account Registration Form</h2>
                <div class="label">
                    <label for="first_name">First Name: *</label>
                    <label for="last_name">Last Name: *</label>
                    <label for="email">Email: *</label>
                    <label for="password">Password: *</label>
                    <label for="confirm_password">Confirm Password: *</label>
                </div>
                <div class="input">
                    <p style="display: block; color: <?= $_SESSION['error_register']['first_name']['text_color'] ?>;">
                    <?= $_SESSION['error_register']['first_name']['text_message'] ?></p>
                    <input type="text" id="first_name" name="first_name" style="border-color: 
                    <?= $_SESSION['error_register']['first_name']['border_color'] ?>;" value="<?= $_SESSION['data_register']['first_name'] ?>">
                    
                    <p style="display: block; color: <?= $_SESSION['error_register']['last_name']['text_color'] ?>;">
                    <?= $_SESSION['error_register']['last_name']['text_message'] ?></p>
                    <input type="text" id="last_name" name="last_name" style="border-color: 
                    <?= $_SESSION['error_register']['last_name']['border_color'] ?>;" value="<?= $_SESSION['data_register']['last_name'] ?>">
                    
                    <p style="display: block; color: <?= $_SESSION['error_register']['email']['text_color'] ?>;">
                    <?= $_SESSION['error_register']['email']['text_message'] ?></p>
                    <input type="email" id="email" name="email" style="border-color: 
                    <?= $_SESSION['error_register']['email']['border_color'] ?>;" value="<?= $_SESSION['data_register']['email'] ?>">
                    
                    <p style="display: block; color: <?= $_SESSION['error_register']['password']['text_color'] ?>;">
                    <?= $_SESSION['error_register']['password']['text_message'] ?></p>
                    <input type="password" id="password" name="password" style="border-color: 
                    <?= $_SESSION['error_register']['password']['border_color'] ?>;">
                    
                    <p style="display: block; color: <?= $_SESSION['error_register']['confirm_password']['text_color'] ?>;">
                    <?= $_SESSION['error_register']['confirm_password']['text_message'] ?></p>
                    <input type="password" id="confirm_password" name="confirm_password" style="border-color: 
                    <?= $_SESSION['error_register']['confirm_password']['border_color'] ?>;">
                </div>
                <p class="note">Note: You must fill-in all the fields with *.</p>
                <input type="hidden" name="process" value="register">
                <input type="submit" id="register" value="Register">
            </form>

            <form action="process.php" method="post" id="process_login">
                <h2>Account Log-in</h2>
                <div class="label">
                    <label for="email">Email:</label>
                    <label for="password">Password:</label>
                </div>
                <div class="input">
                    <p style="display: block; color: <?= $_SESSION['error_login']['email']['text_color'] ?>;">
                    <?= $_SESSION['error_login']['email']['text_message'] ?></p>
                    <input type="email" id="email" name="email" style="border-color: 
                    <?= $_SESSION['error_login']['email']['border_color'] ?>;" value="<?= $_SESSION['data_login'] ?>">

                    <p style="display: block; color: <?= $_SESSION['error_login']['password']['text_color'] ?>;">
                    <?= $_SESSION['error_login']['password']['text_message'] ?></p>
                    <input type="password" id="password" name="password" style="border-color: 
                    <?= $_SESSION['error_login']['password']['border_color'] ?>;">
                </div>
                <input type="hidden" name="process" value="login">
                <input type="submit" id="login" value="Log-in">
            </form>
        </div>
    </body>
</html>