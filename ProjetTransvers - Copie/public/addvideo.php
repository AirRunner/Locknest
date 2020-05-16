<!DOCTYPE html>
<html>
<?php
if(!isset($_SESSION))
{
session_start();
}
include('firebase.php');
?>
<head>
<title> Video upload</title>
<head>
<body>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Titre</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/magnific-popup.css">                                <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->


</head>
    <body>        
        <div class="container">
            <div class="row">
                <div class="tm-left-right-container">
                    <!-- Left column: logo and menu -->
                    <div class="tm-blue-bg tm-left-column">                        
                        <div class="tm-logo-div text-xs-center">
                            <img src="img/LockNestDinosaure.png" class="logo" alt="Logo">
                            <h1 class="tm-site-name">Locknest</h1>
                        </div>
                            <ul class="tm-main-nav-ul">
                                    <a class="connect" href="Home.php"><b>HOME</b></a>
                                <br><br>
                                <li class="tm-nav-item">
                                <a href="logout.php" class="tm-nav-item-link">Déconnection</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="addvideo.php" class="tm-nav-item-link">ajouter video</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#secondgallery" class="tm-nav-item-link">Téléchargement</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#contact" class="tm-nav-item-link">Nous contacter</a>
                                </li>

                            </ul>                                       
                    </div>
                </div>
            </div>
        </div>

<form method="post" action="addvideo.php" enctype="multipart/form-data" style="text-align:center;color:#fff;">

<input type="file" name="file" >
<input type="submit" name="upload" value="UPLOAD">
</form>
<body>
</html>

<?php
include('db.php');
if(isset($_POST['upload']))
{
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $ID =  $_SESSION['ID'];
    $timestamp = date('Y-m-d H:i:s');
    move_uploaded_file($tmp, "videos/".$name);

    $sql = "INSERT INTO  videos (id,name,Date) VALUES('$ID','$name','$timestamp')";

    $res = mysqli_query($con,$sql);

    if($res == 1)
    {
        echo"<h1>video inserted successfully</h1>";
    }
}