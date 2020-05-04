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
    <div class="profile_user">
        <h1 class = "Profile_h1"><u> Shia LaBeouf</u></h1>
        <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">
          <input id="profile-image-upload" class="hidden" type="file">
        </div>
        <hr >
        <h4>First Name: Shia </h4>
        <hr class="profile_hr">
        <h4>Middle Name: </h4>
        <hr class="profile_hr">
        <h4>Last Name: LaBeouf</h4>
        <hr class="profile_hr">
        <h4>Date Of Birth: June 11, 1986</h4>
        <hr class="profile_hr">
        <h4>UTORID: Shiaf4</h4>
        <hr class="profile_hr">
        <h4>Join Date: February 11, 2018</h4>
        <hr class="profile_hr">
        <span class="login_controls">
          <button class="login_btn">Edit Profile</button>
        </span>
      </div>
  </body>
</html>
