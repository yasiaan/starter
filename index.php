<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="assets/logo.ico" />
        <title>Mythes Contemporains</title>
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Background Image-->
        <img class="bg-image" src="assets/img/bg.jpg"/>
        <!-- Masthead-->
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1  style="font-family:'Heorot Regular';font-weight:normal;font-size:42px;">MYTHES <span
                                                    style="font-family:'Heorot Shadow Regular'">CONTEMPORAINS</span></h1>
                    <p class="mb-5">Notre site Web sera bientôt disponible. Nous travaillons dur pour terminer le développement de ce site. Inscrivez-vous ci-dessous pour recevoir des mises à jour et être informé du lancement de notre site !</p>
                    
                    <form id="contactForm" action="sender.php" method="POST">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" name="email" id="email" type="email" placeholder="Entrer votre adresse e-mail..." required autofocus /></div>
                            <div class="col-auto"><button class="btn btn-info" name="send" id="submitButton" type="submit">Informez-moi !</button></div>
                        </div>
                        <!-- Submit success message-->
                        <div id="submitSuccessMessage">
                            <div class="text-center mb-3 mt-2">
                                <div class="fw-bolder">
                                    <?php
                                    if( isset($_SESSION['success']) ){
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                    }
                                    ?>    
                                </div>
                            </div>
                            <div class="text-center text-danger mb-3 mt-2">
                                <?php
                                if( isset($_SESSION['error']) ){
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Social Icons-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="https://twitter.com/MythesCont" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href="https://fb.com/mythescontemporains" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href="https://www.instagram.com/mythescontemporains" target="_blank"><i class="fab fa-instagram" target="_blank"></i></a>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
