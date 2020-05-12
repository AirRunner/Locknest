<?php


include("db.php");

include('firebase.php');

if(isset($_GET['id_video'])){
    $id = $_GET['id_video'];




$sql = "select name from videos where id_video='$id'";
$res = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($res);

$name = $row['name'];

echo "<h1 style=margin-left:500px;>you are watching ".$name."</h1>";


?>



<video width="615" height="315" controls style="margin-left:600px;">
<source src="videos/<?php echo $name; ?>" type="video/mp4">
</video>
<br>
<a href="home.php" style="margin-left:880px;">Retour</a>


<style>
a{
  width: 100%;
  text-decoration: none;
  color: black;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin-left:40%;
  margin-right:40%;
  
}
</style>
<?php

}
?>