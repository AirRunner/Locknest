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
                                    <a class="connect" href="logout.php"><b>Deconnecter</b></a>
                                <br><br>
                                <li class="tm-nav-item">
                                    <a href="login.php" class="tm-nav-item-link">page principale</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#secondgallery" class="tm-nav-item-link">Téléchargement</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#thirdgallery" class="tm-nav-item-link">A propos</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#contact" class="tm-nav-item-link">Nous contacter</a>
                                </li>
                            </ul>                                       
                    </div> <!-- Left column: logo and menu
                
                -->
                    <!-- Right column: content -->
                    <div class="tm-right-column">
                        <figure>
                            <img src="img/header.png" alt="Header image" class="img-fluid">    
                        </figure>
                        <table>
                            <tr >
                                <td class="test">Vidéos</td>
                                <td class="test">Date</td>
                            </tr>
                                <?php
                                    include('db.php');
                                    $ID =  $_SESSION['ID'];
                                    $sql = "SELECT * FROM videos where id=$ID";
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {/// output data of each row
                                        
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr><td><a href='watch.php?id_video=$row[id_video]'>".$row['name']."</a></td><td>$row[Date]</td></tr>";
                                        }
                                        echo "</table>";
                                    } 
                                    else {echo "0 results";} ///Print 0 results if Nothing
                                    $con->close();
                                ?>
                        </table>  


                    </div>

                    <div class="tm-content-div">
                        <!-- Welcome section -->
                        
                        <footer>
                            <p class="tm-copyright-p">Copyright &copy; <span class="tm-current-year">2020</span> Locknest
                            
                            | Designed by someone</p>
                        </footer>
                    </div>  
                        
                    </div> <!-- Right column: content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
                
        <!-- load JS files -->
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="js/jquery.magnific-popup.min.js"></script>     <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script>     
       
            $(document).ready(function(){

                // Single page nav
                $('.tm-main-nav').singlePageNav({
                    'currentClass' : "active",
                    offset : 20
                });

                // Magnific pop up
                $('.tm-gallery-1').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-gallery-2').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-gallery-3').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-current-year').text(new Date().getFullYear());                
            });
        </script>             
</body>
</html>
<style>
table{
    margin-left:25%;
    font-family: monospace;
    border:1px solid #0b0b0b;
    margin:10px;
    padding:3px;
}
td{
    border:1px solid #0b0b0b;
}
</style>
