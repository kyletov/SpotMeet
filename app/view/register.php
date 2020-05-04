<php
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <title>Register</title>
	</head>

	<body>
		<div class="container">
      <div class="login_box">
          <h1 class="login_title">Register</h1>
			      <form method="post" action="index.php" >
			        <label for="login_field">Utorid</label>
			        <input id="login_field" class="login_input" name="user" type="text"><br>
			        <label for="password">Password</label>
			        <input id="password" class="login_input" name="password" type="password">
			        <label for="email_field">Email</label>
			        <input id="email_field" class="email_input" name="email" type="text"><br>
			        <label for="name_field">Name</label>
			        <input id="name_field" class="name_input" name="name" type="text"><br>
			        <label for="dateOfBirth_field">Date of Birth</label>
			        <input id="dateOfBirth_field" class="dateOfBirth_input" name="dateOfBirth" type="text"><br>
			        <span class="login_controls">
			            <button class="login_btn" type="submit" name="submit" value="register">Register</button>
			        </span>
              <?php echo(view_errors($errors)); ?>
			    </form>
		    </div>
      </div>
	</body>
</html>
