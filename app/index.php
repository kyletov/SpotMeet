<?php
	ini_set('display_errors', 'On');
	require_once "lib/db_connection.php";
	require_once "lib/view_errors.php";
	require_once "model/UserDAO.php";
	require_once "model/ActivityDAO.php";

  // We'll need to create a 'sess' folder to store the sessions
	session_save_path("sess");
	session_start();

	$dbconn = db_connect();

	$errors = array();
	$view = "";

	/* controller code */
	if (!isset($_SESSION['state'])){
		$_SESSION['state'] = 'login';
	}

	switch($_SESSION['state']){
		case "login":
			// the view we display by default
			$view = "login.php";

	    // Check to see if the state is new member, if so change view and state
	    if (isset($_REQUEST['operation'])){
        if ($_REQUEST['operation'] == "forgotpassword"){
					$_SESSION['state'] = 'forgot password';
        	$view = "forgot_password.php";
        	break;
        }
	    }

			// check if submit or not
			if (empty($_REQUEST['submit'])){
				break;
			}

			if ($_REQUEST['submit'] == "register") {
				$_SESSION['state'] = 'register';
				$view = "register.php";
				break;
			}

			// validate and set errors
			if (empty($_REQUEST['user'])){
				$errors[] = 'user is required';
			}
			if (empty($_REQUEST['password'])){
				$errors[] = 'password is required';
			}
			if (!empty($errors))break;

			// perform operation, switching state and view if necessary
			$_SESSION['user'] = UserDAO::login($_REQUEST['user'], $_REQUEST['password']);

			if (!isset($_SESSION['user']) || $_SESSION['user'] === NULL) {
				$errors[] = "invalid login";
			} else {
        $_SESSION['state'] = 'main';
        $view = "main.php";
		  }
			break;

		case "register":
			// the view we display by default
			$view = "register.php";

			// Check to see if the state is new member, if so change view and state
			if (isset($_REQUEST['operation'])){
				if ($_REQUEST['operation'] == "back"){
					$_SESSION['state'] = 'login';
					$view = "login.php";
					break;
				}
			}

			// check if submit or not
			if (empty($_REQUEST['submit']) || $_REQUEST['submit'] != "register"){
				break;
			}

			// validate and set errors
			if (empty($_REQUEST['user'])){
				$errors[] = 'user is required';
			}
			if (empty($_REQUEST['password'])){
				$errors[] = 'password is required';
			}
			if (empty($_REQUEST['email'])){
				$errors[] = 'email is required';
			}
			if (empty($_REQUEST['name'])){
				$errors[] = 'name is required';
			}
			if (empty($_REQUEST['dateOfBirth'])){
				$errors[] = 'date of birth is required';
			}
			if (!empty($errors))break;

			// perform operation, switching state and view if necessary
			$userInput = [
				"utorid" => $_REQUEST['user'],
				"password" => $_REQUEST['password'],
				"email" => $_REQUEST['email'],
				"name" => $_REQUEST['name'],
				"dateOfBirth" => $_REQUEST['dateOfBirth']
			];

			if (UserDAO::createUser($userInput)) {
				$_SESSION['state'] = 'login';
				$view = "login.php";
			} else {
				$errors[] = "Invalid fields or account already exists.";
			}
			break;

		case "forgot password":
    	// the view we display by default
    	$view = "forgot_password.php";

    	if ($_REQUEST['operation'] == "back"){
				$_SESSION['state'] = 'login';
      	$view = "login.php";
      }

      // check if submit or not
			if (empty($_REQUEST['submit']) || $_REQUEST['submit'] != "submit"){
				break;
			}

      // validate and set errors
			if (empty($_REQUEST['answer'])){
				$errors[] = 'answer not filled';
			}

			// Check answer, if correct, go to password change.
  		break;

    case "main":
    	// the view we display by default
    	$view = "main.php";

    	if ($_REQUEST['operation'] == "main"){
				$_SESSION['state'] = 'main';
      	$view = "main.php";
      } else if ($_REQUEST['operation'] == "activity"){
				$_SESSION['state'] = 'activity';
      	$view = "activity.php";
      } else if ($_REQUEST['operation'] == "user_profile"){
				$_SESSION['state'] = 'user_profile';
      	$view = "user_profile.php";
      } else if ($_REQUEST['operation'] == "logout"){
				session_destroy();
      	$view = "login.php";
      }
  		break;

  	case "activity":
    	// the view we display by default
    	$view = "activity.php";

			if ($_REQUEST['operation'] == "main"){
				$_SESSION['state'] = 'main';
      	$view = "main.php";
      } else if ($_REQUEST['operation'] == "user_profile"){
				$_SESSION['state'] = 'user_profile';
      	$view = "user_profile.php";
      } else if ($_REQUEST['operation'] == "logout"){
				session_destroy();
      	$view = "login.php";
      }
  		break;

  	case "user_profile":
    	// the view we display by default
    	$view = "user_profile.php";

			if ($_REQUEST['operation'] == "main"){
				$_SESSION['state'] = 'main';
      	$view = "main.php";
      } else if ($_REQUEST['operation'] == "user_profile"){
				$_SESSION['state'] = 'user_profile';
      	$view = "user_profile.php";
      } else if ($_REQUEST['operation'] == "logout"){
				session_destroy();
      	$view = "login.php";
      }
  		break;

  	case "change password":
    	// the view we display by default
    	$view = "change_password.php";

    	if ($_REQUEST['operation'] == "logout"){
				session_destroy();
      	$view = "login.php";
      }
  		break;

	}
	require_once "view/$view";
?>
