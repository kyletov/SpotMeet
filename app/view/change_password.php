<?php
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Change Password</title>
    </head>
    <body>
        <br><br><br>
        <div class="container">
            <div class="top_bar">
                <ul>
                    <li><a class="active" href="?operation=main"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="?operation=login">Logout</a></li>
                    <li><a href="#Menu"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
                    <li><a href="?operation=user_profile"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile</a></li>
                    <li class="search_bar"><a href="#Notifications"><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
                    <li class="search_bar"><form action="#search">
                        <button type="submit" class="search_button"><i class="fa fa-search"></i></button></li>
                    <li class="search_bar"><input search-input id="search" class="search_input" name="search" type="text" placeholder="Search..."></li>
                    </form>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="login_box">
                <h1 class="login_title">New Password</h1>
                <form method="post" action="user_profile.php" >
                    <label for="login_field">Old Password</label>
                    <input id="login_field" class="login_input" name="old_pass" type="text"><br>
                    <label for="password">New Password</label>
                    <input id="password" class="login_input" name="new_pass" type="text"><br>
                    <label for="password">Confirm Password</label>
                    <input id="password" class="login_input" name="confirm_pass" type="text">
                    <span class="login_controls">
                        <button class="login_btn" type="submit" name="submit" value="save_changes">Save changes</button>
                    </span>
                    <?php echo(view_errors($errors)); ?>
                </form>
            </div>
        </div>
    </body>
</html>
