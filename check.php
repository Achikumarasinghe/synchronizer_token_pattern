<?php
    session_start();
	
    function generateToken() {
        
        $token = '';
        
        $token .= bin2hex(random_bytes(32));
        
        $_SESSION['csrf_token'] = $token;
        return $token;
    }
	
    function logout() {
        unset($_COOKIE['session_cookie']);
        setcookie('session_cookie', null, -1, '/');
        unset($_SESSION);
        header("location: login.php");
    }
    
    if(isset($_POST['logout'])){
        logout();
    } elseif (isset($_POST['token_request'])){
        if($_POST['token_request'] == $_COOKIE['session_cookie']){
            
            echo $_SESSION['csrf_token'];
        }else { 
            echo "error"; 
        }
    } else if (isset($_POST['check'])){
        if($_POST['token'] == $_SESSION['csrf_token']){
            header("location: success_msg.php");
        }else {
            header("location: error_msg.php");
        }
    }
?>
