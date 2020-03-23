<!DOCTYPE html>
<html>
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
                                    <a href="login.php" class="tm-nav-item-link">S'inscrire</a>
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

                        <div class="tm-content-div">
                            <!-- Welcome section -->
                            <section id="welcome" class="tm-section">
                                <header>
                                    <h2 class="tm-blue-text tm-welcome-title tm-margin-b-45">Bienvenue sur Locknest</h2>
                                </header>
                                <p>dublabla</p>
                            </section>
                            <!-- About section -->
                            <section id="about" class="tm-section">
                                <div class="row">                                                                
                                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
                                        <header>
                                            <h2 class="tm-blue-text tm-section-title tm-margin-b-45">Services</h2>
                                        </header>
                                        <p>dublabla</p>
                                        <a href="#" class="boutton">Read More</a>  
                                    </div>

                                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
                                        <img src="img/phone.jpg" alt="Image" class="img-fluid">    
                                    </div>  
                                </div>                            
                            </section>  

                            <!-- Gallery One section -->     
                            

                            <!-- Contact Us section -->
                            <section id="contact" class="tm-section">
                                <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Contact Us</h2></header>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="#contact" method="post" class="contact-form">
                                            <div class="form-group">
                                                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Nom"  required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                                            </div>
                                            <div class="form-group">
                                                <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                                            </div>                                            
                                            <button type="submit" >Send</button>
                                        </form>    
                                    </div>
                                    
                                    <div class="col-lg-6 tm-contact-right">
                                        <p>
                                            Si vous avez la moindre question, n'hésitez pas à nous contacter.
                                        </p>
                                        <address>
                                            30/32 avenue de la république,<br>
                                            Villejuif, 94800<br>
                                            France
                                        </address>
                                    </div>
                                </div>
                                
                            </section>
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