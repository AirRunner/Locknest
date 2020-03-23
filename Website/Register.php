

<!DOCTYPE html>
<html>
    <head>
        <title>Locknest</title>
    </head>


    <body>
        <div class="header">
            <h1>Locknest inscription</h1>
        </div>
        <script>

</script>
        <form method="post" action="Register.php" class="box">
                <h1>Inscription<h1>
                <input type="text" name="username" class="textInput" placeholder="username">
                <input type="email" name="email" class="textInput" placeholder="email">
                <input type="password" name="password" class="textInput" placeholder="password" >           
                <input type="password" name="password2" class="textInput" placeholder="password2">
                <input type="submit" name="register_btn" value="Register">
                <a name="Login_btn" value="Login" href="connexion.php" class="textInput">Login</a>
                <?php
                $_SESSION['message']="";

                $db =mysqli_connect("localhost","root","","locknest");
                if ($db->connect_error) {die("Connection failed: " . $db->connect_error);}
                if(isset($_POST['register_btn']) && !empty($_POST) ){
                    
                    $Username = ($_POST['username']);
                    $Email = ($_POST['email']);
                    $Password = ($_POST['password']);
                    $Password2 = ($_POST['password2']);

                    $check_duplicate_username = "SELECT Username FROM loginform WHERE Username ='$Username' ";
                    $result = mysqli_query($db,$check_duplicate_username);

                    $count = mysqli_num_rows($result);
                
                    if($count>0){
                        $_SESSION['message']= "The two passwords do not match";
                        sleep(5);
                        header("location:Register.php");
                    exit;
                    }
                    if(strlen($Password)<5 || strlen($Password)>10 )
                    {
                        echo"Password too shor or too long ";
                        sleep(5);
                        header("location:Register.php");
                       
                    exit;
                    }
                    else
                    {
                        
                        if($Username =='' || empty($Username)){
                            echo"Username can't be void";
                            sleep(5);
                            header("location:Register.php");
                            
                            exit;
                        }
                        
                        if($Password =='' || empty($Password)){
                            echo"Password can't be void";
                            sleep(5);
                            header("location:Register.php");
                            exit;
                        }
                        if($Password == $Password2){
                            //create user
                            $Password =md5($Password); // hash password before storing for security purposes
                            $sql="INSERT INTO loginform(Username, email,Password) VALUES('$Username','$Email','$Password')";
                            mysqli_query($db,$sql);
                            header("location:connexion.php"); //redirect
                    }
                        else{
                            echo"Username can't be void";
                            sleep(5);
                            header("location:Register.php"); //redirect
                        }
                    }
                    
                }
            ?>
        </form>

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

    <style>
</html>