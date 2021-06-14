<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration Form</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="main_style.css">
    </head>
    <body>
        <?php
        require_once('new_connection.php');
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM accounts WHERE accounts.id = '{$user_id}';";
        $account_data = run_mysql_query($query);

        if($_SESSION['process'] == "register")
        {
            ?>
            <div class="registration_container">
                <h1>Registration Successful!</h1>
                <h3>Thank you for submitting your information</h3>
                <h2><?= $account_data[0]['first_name'] . " " . $account_data[0]['last_name'] ?></h2>
                <h4>An email confirmation will be sent to your registered E-mail (<?= $account_data[0]['email'] ?>). 
                For our validation. Thank you...</h4>
                <form action="process.php" method="post">
                    <input type="hidden" name="process" value="return">
                    <input type="submit" id="return" value="Return">
                </form>
            </div>
            <?php
        }
        elseif($_SESSION['process'] == "login")
        {
            ?>
            <div class="login_container">
                <div class="login_page">
                    <a href=""><br>Upload<br>a<br>photo</a>
                    <h2><p>Welcome back,</p><?= $account_data[0]['first_name'] . " " . $account_data[0]['last_name'] ?></h2>
                </div>
                <div class="about">
                    <h5>About Myself:</h5>
                    <ul>
                        <li>Mothers spend months of their lives waiting on their children.</li>
                        <li>They improved dramatically once the lead singer left.</li>
                        <li>She says she has the ability to hear the soundtrack of your life.</li>
                    </ul>
                    <form action="process.php" method="post">
                        <input type="hidden" name="process" value="return">
                        <input type="submit" id="logout" value="Log Out">
                    </form>                    
                </div>
                <div class="post">
                    <p>Failing to recall a memory. Unable to remember something. Someone being in a situation that they are 
                        unfamiliar or unsuited for.</p>
                    <img src="https://phillipbrande.files.wordpress.com/2013/10/random-pic-14.jpg" alt=" Random Photo">
                    <p>Plans for this weekend include turning wine into water. He wore the surgical mask in public not to 
                        keep from catching a virus, but to keep people away from him.</p>
                    <img src="https://sm.mashable.com/mashable_sea/photo/default/man-fakes-death-cat-q6u_2z9w.png" alt=" Random Photo">
                </div>
            </div>
            <?php
        }
        ?>
    </body>
</html>