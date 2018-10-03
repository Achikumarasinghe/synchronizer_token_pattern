<?php
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(($username == "abc") && ($password == "123")){
					
            $_SESSION['csrf_session'] = "token_session";
			session_regenerate_id();
			setcookie("session_cookie", session_id(), (time() + (56400)), "/");
			
			include("check.php");
			generateToken();
            header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>
    

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>
<body style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h1 style="color:HOTPINK">Login</h1></div><br>
                    <form action="login.php" method="POST">
                        <input type="text" name="username" id="username" class="form-control" style="border-radius: 0;"><br>
						<input type="password" name="password" id="password" class="form-control" style="border-radius: 0;"><br>
                       <button type="submit" class="btn btn-outline-danger mt-5" name="login">Login</button>
						

                    </form>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>