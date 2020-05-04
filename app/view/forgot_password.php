<?php
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Forgot Password</title>
    </head>
    <body>
        <div class="container">
            <div class="login_box">
                <h1 class="login_title">Forgot Password</h1>
                <form method="post" action="change_password.php" >
                    <label for="login_field">Security Question:<br><br>(Extract from DataBase) </label><br>
                    <label for="login_field">Answer: </label>
                    <input id="login_field" class="login_input" name="security_answer" type="text">
                    <span class="login_controls">
                        <button class="login_btn" type="submit" name="submit" value="security_answer">Submit</button>
                    </span>
                    <?php echo(view_errors($errors)); ?>
                </form>
            </div>
        </div>
    </body>
</html>
