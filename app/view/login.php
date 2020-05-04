<?php
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <title>Welcome to Application</title>
    </head>
    <body>
        <div class="container">
            <div class="login_box">
                <h1 class="login_title">Welcome to Application</h1>
                <form method="post" action="index.php" >
                    <label for="login_field">Username</label>
                    <input id="login_field" class="login_input" name="user" type="text"><br>
                    <label for="password">Password</label>
                    <input id="password" class="login_input" name="password" type="password">
                    <a class="password_forgot" href="?operation=forgotpassword">forgot password?</a><br>
                    <span class="login_controls">
                        <button class="login_btn" type="submit" name="submit" value="register">Sign Up</button>
                        <button class="login_btn" type="submit" name="submit" value="login">Login In</button>
                    </span><br>
                    <?php echo(view_errors($errors)); ?>
                </form>
            </div>
        </div>
   </body>
</html>
