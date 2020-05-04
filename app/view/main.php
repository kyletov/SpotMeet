<?php
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Main Page</title>
    </head>
    <body>
        <br><br><br>
        <div class="activities">
            <h1><u>Activities</u></h1>
            <a href="?operation=activity">Activity 1</a>

        </div>

        <div class="activities">
            <h1><u>Saved Activities</u></h1>
            <a href="?operation=activity">Saved Activity 1</a>

        </div>

        <div class="container">
            <div class="top_bar">
                <ul>
                    <li><a class="active" href="?operation=main"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li><a href="?operation=logout">Logout</a></li>
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

   </body>
</html>
