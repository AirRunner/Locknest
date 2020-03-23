<?php

    $db =mysqli_connect("localhost","root","","locknest");
    if ($db->connect_error) {die("Connection failed: " . $db->connect_error);}

    if(isset($_POST['login_btn'])){
        session_start();
        $Username = ($_POST['username']);
        $Password = ($_POST['password']);

        $Password = md5($Password);
        $sql = "SELECT *FROM loginform WHERE Username='$Username' AND Password='$Password'";
        $result = mysqli_query($db,$sql);

        if(mysqli_num_rows($result)==1){
                $_SESSION['message']="Succesfull login";
                header("location:login.php"); //redirect
            }
        else{
            $_SESSION['message']="Username/password are incorrect";
        }
    }
?>






<!DOCTYPE html>
<html>
    <head>
        <title>Locknest Connexion</title>
    </head>
    <link rel="stylesheet" media="screen" type="text/css" title="Register" href="Register.php" />

    <body>
        <div class="header">
            <h1>Locknest Connexion</h1>
        </div>

        <form method="post" action="connexion.php" class="box">
            <h1>Login<h1>
                <input type="text" name="username" class="textInput" placeholder="username">
                <input type="password" name="password" class="textInput"placeholder="password">
                <input type="submit" name="login_btn" value="Login">
                <a name="Register_btn" value="Login" href="Register.php" class="textInput">Register</a>
        </form>
        <a name="Register_btn" value="Login" href="index.php" class="textInput">retour</a>

    </body>



    <style>
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background:#175c74;
    opacity:0.5;
    
  }
  h1{
      text-align:center;
  }
  .box{
    width: 300px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #191919;
    text-align: center;
    border-radius:20px;
  }
  .box h1{
    color: white;
    text-transform: uppercase;
    font-weight: 500;
  }
  .box input[type = "text"],.box input[type = "password"]{
    border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
  }
  .box input[type = "text"]:focus,.box input[type = "password"]:focus{
    width: 280px;
    border-color: #2ecc71;
  }
  .box input[type = "submit"]{
    border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
  }
  .box input[type = "submit"]:hover{
    background: #2ecc71;
  }
  .textInput{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
}
</style>
  
</html>