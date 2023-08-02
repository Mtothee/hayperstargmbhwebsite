<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './lib/phpmailer/Exception.php';
require './lib/phpmailer/PHPMailer.php';
require './lib/phpmailer/SMTP.php';


//prüfen ob die website gepostet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['txtname'];
    $telefonnummer = $_POST['txttelefonnummer'];
    $emailadresse = $_POST['txtemail'];
    $anliefertage = $_POST['txtanliefertage'];
    $wieware = $_POST['txtwieware'];
    $startdatum = $_POST['txtstartdatum'];
    $weitereinfos = $_POST['txtweitereinfos'];


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.strato.de';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@hayper-star.de';                     //SMTP username
        $mail->Password   = 'SimL0723!?';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@hayper-star.de', 'Hayper Star Website');
        $mail->addAddress('info@hayper-star.de', 'Edris');     //Empfänger
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Neue Anfrage von Website';
        $mailbodytext = 'Du hast eine neue Anfrage erhalten. Hier die Infos: <br><br> <hr>
        <b>Name:</b> ' . $name . '<br>
        <b>Telefonnummer:</b> ' . $telefonnummer . '<br>
        <b>E-Mail Adresse:</b> ' . $emailadresse . '<br>
        <b>Anliefertage:</b> ' . $anliefertage . '<br>
        <b>Warenanlieferung auf Paletten oder Rolli:</b> ' . $wieware . '<br>
        <b>Startdatum:</b> ' . $startdatum . '<br><br>
        <b>Weitere Informationen:</b> ' . $weitereinfos . '
        <hr>
        <br><br>
        Ende der Nachricht.
        ';

        $mail->Body    = $mailbodytext;
        
        $mail->send();
        $mailsent="1";
    } catch (Exception $e) {
        $mailsent="0";
    }
}
?>
 
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Hayper Star GmbH - Warenverräumung und Regalauffüllung</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Warenverräumung, Warenverräumer, Regalauffüllung, Burgkirchen, Altötting, Mühldorf, Verräumung" name="keywords">
    <meta content="Wir bieten professionelle Warenverräumung und Regalauffüllung für Groß- und Einzelhandel." name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="./font/fonts.css" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#d7cdcc">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Lade...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                   <img src="./img/logo.png" alt="">
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="bi bi-geo-alt" style="font-size: 1.2rem; color: #1193cd;"> </i>
                    
                    <p class="m-0 p-2">  Ebner-Eschenbach-Weg 25 - 84508 Burgkirchen</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="bi bi-envelope" style="font-size: 1.2rem; color: #1193cd;"> </i>
             
                    <p class="m-0 p-2">info@hayper-star.de</p>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="bi bi-instagram" style="font-size: 1.2rem; color: #1193cd;"> </i>
             
                    <p class="m-0 p-2"><a href="https://www.instagram.com/hayperstar_services/">hayperstar_services</a></p>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <img src="./img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <i class="bi bi-list" style="font-size: 1.2rem; color: #1193cd;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="index.php" class="nav-item nav-link active">Startseite</a>
                    <a href="#warenverraeumer" class="nav-item nav-link">Warenverräumung & Regalauffüllung</a>
                    <a href="#kontakt" class="nav-item nav-link">Jetzt anfragen</a>
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                        <i class="bi bi-whatsapp" style="font-size: 1.2rem; color: #1193cd;"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white" style="color: #fff321 !important;">Jetzt direkt per WhatsApp anfragen</p>
                        <p class="mb-1 text-white" style="color: #ffffff !important;">Klicken Sie auf die Nummer um uns eine Nachricht zu senden.</p>
                       
                        <a href="https://api.whatsapp.com/send?phone=+49 176 70941699&text=Hallo%2C%20ich%20habe%20eine%20Frage%20zu%20Ihren%20Dienstleistungen%3A"> <h5 class="m-0 text-secondary">+49 176 70941699</h5></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-2" >
        <div class="owl-carousel header-carousel position-relative"  >
            <div class="owl-carousel-item position-relative" >
                <img class="img-fluid" src="img/regal-7.jpeg" alt="" >
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Schnell & effizient</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Warenverräumung</h1>
                                <a href="#kontakt" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">unverbindliches Angebot</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/regal-6.jpeg" alt="" >
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Erfahrung & Kompetenz</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Regalauffüllung & Streckenlieferung</h1>
                                <a href="#kontakt" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">unverbindliches Angebot</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div id="warenverraeumer" class="container-xl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="mb-5" src="./img/logo-gross.png" alt="">
                    <h1 class="mb-4">Wir bieten Kompetenz & Erfahrung im Bereich der Warenverräumung & Regalauffüllung.</h1>
                   
                    
                    <p class="fw-medium text-primary"><i class="bi bi-check text-success me-3" style="font-size: 2rem;color: #fff321 !important;"></i>Wir verräumen Ihr Lieferungen</p>
                    <p>Unsere Warenveräumungsdienstleistung ist der Schlüssel zu einer reibungslosen Einkaufserfahrung, die Ihre Kunden begeistern wird. Lassen Sie uns Ihre Regale in wahre Schätze verwandeln und Ihre Produkte in den Vordergrund rücken.</p>
                    
                    <p class="fw-medium text-primary"><i class="bi bi-check text-success me-3" style="font-size: 2rem;color: #fff321 !important;"></i>geschultes Personal</p>
                    <p>Unser geschultes und perfekt eingespieltes Team sorgt dafür, dass Ihr Geschäft immer sauber und einladend aussieht.</p>
                    
                    <p class="fw-medium text-primary"><i class="bi bi-check text-success me-3" style="font-size: 2rem;color: #fff321 !important;"></i>Streckenlieferung</p>
                    <p>Wir verräumen auch Waren aus Streckenlieferungen - wir passen unsere Dienstleistung an Ihre spezifischen Anforderungen an.</p>
                    
                    <p class="fw-medium text-primary"><i class="bi bi-check text-success me-3" style="font-size: 2rem;color: #fff321 !important;"></i>Nachtschicht & Spätschicht</p>
                    <p>Gerne verräumen wir die Paletten vor oder nach Ihren Öffnungszeiten.</p>
                   
                    <p class="fw-medium text-primary"><i class="bi bi-check text-success me-3" style="font-size: 2rem;color: #fff321 !important;"></i>"Facing" der Regale durch Spiegelung</p>
                    <p>Wir ziehen die Ware an den Rand der Regale und richten diese optisch ansprechend aus.</p>
                   

                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/regal-6.jpeg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="img/regal-7.jpeg" style="object-fit: cover; border-style: solid;
                        border-width: 5px 5px 0px 0px; border-color: #fff321; " alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
     
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="bi bi-check text-white mb-3" style="font-size: 4rem; color: #fff321 !important;"></i>
                    <h2 class="text-white mb-2">100%</h2>
                    <h3 class="text-white mb-0">Weiterempfehlung</h3>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="bi bi-geo fa-2x text-white mb-3" style="font-size: 4rem;color: #fff321 !important;"></i>
                    <h2 class="text-white mb-2"> bis 300 km</h2>
                    <h3 class="text-white mb-0">Umkreis</h3>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="bi bi-people fa-2x text-white mb-3" style="font-size: 4rem;color: #fff321 !important;"></i>
                    <h2 class="text-white mb-2">> 25</h2>
                    <h3 class="text-white mb-0">Vertragskunden</h3>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="bi bi-battery-charging fa-2x text-white mb-3" style="font-size: 4rem;color: #fff321 !important;"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">3456</h2>
                    <h3 class="text-white mb-0">verräumte Paletten</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->




    <!-- Booking Start -->
    <div id="kontakt" class="container-fluid my-5 px-0">
        <div class="video wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-white mb-4">Professionelle Warenverräumung</h1>
            <h3 class="text-white mb-0">24 Stunden am Tag -  7 Tage die Woche</h3>
        </div>
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -6rem;">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="bg-light text-center p-3">
                        <h1 class="mb-4">Unverbindlich Anfragen</h1>
                        <p class="mb-4">Gerne erstellen wir Ihnen ein unverbindliches Angebot - passgenau zu Ihren Anforderungen.</p>
                        <form action="index.php#kontakt" method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input id="txtname" name="txtname" type="text" class="form-control border-0" placeholder="Ihr Name" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input id="txttelefonnummer" name="txttelefonnummer" type="text" class="form-control border-0" placeholder="Telefonnummer" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input id="txtemail" name="txtemail" type="email" class="form-control border-0" placeholder="Ihre E-Mail" style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input id="txtanliefertage" name="txtanliefertage" type="text" class="form-control border-0" placeholder="Anliefertage (z.B. Montag, Donnerstag)" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select id="txtwieware" name="txtwieware" class="form-select border-0" style="height: 55px;">
                                        <option selected>Wie erhalten Sie Ihre Ware?</option>
                                        <option value="auf Rollen">auf Rollen</option>
                                        <option value="auf Paletten">auf Paletten</option>
                                        <option value="beides">beides</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" id="txtstartdatum" name="txtstartdatum"
                                            class="form-control border-0 datetimepicker-input"
                                            placeholder="Start Datum" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea id="txtweitereinfos" name="txtweitereinfos" class="form-control border-0" placeholder="Wünsche oder weitere Informationen" rows="5"></textarea>
                                </div>
                                <div class="col-12">
                                    <?php
                                        if ($mailsent=="1"){
                                            echo '<div class="alert alert-success" role="alert">
                                                    <b>Vielen Dank für Ihre Nachricht. Wir kümmern uns umgehend darum!</b>
                                                </div>';
                                        }else{
                                            echo '<button class="btn btn-primary w-100 py-3" type="submit">Anfragen</button>';
                                        }
                                    ?>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->



    <!-- Footer Start -->
    <div class="container-fluid text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col">
                    <img class="mb-3" src="./img/logo-white.png" width="30%" >
                    <p class="mb-2"><i class="bi bi-info" style="font-size: 2rem; color: #ffffff;"> </i>Hayper Star GmbH</p>
                    <p class="mb-2"><i class="bi bi-geo-alt" style="font-size: 1rem; color: #ffffff;"> </i>Ebner-Eschenbach-Weg 25 - 84508 Burgkirchen</p>
                    <p class="mb-2"><i class="bi bi-telephone" style="font-size: 1rem; color: #ffffff;"> </i>+49 176 70941699</p>
                    <p class="mb-2"><i class="bi bi-envelope" style="font-size: 1rem; color: #ffffff;"> </i> info@hayper-star.de</p>
                </div>
            </div>
            <!-- Row Impressum links etc.-->
            <div class="row justify-content-end">
               
                <a href="./impressum.html" style="color: #ffffff;">§ Impressum</a>
                <a href="./impressum.html" style="color: #ffffff;">§ Datenschutz</a>
            </div>



        </div>

        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; Hayper Star GmbH, Alle Rechte vorbehalten.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        designed with <i class="bi bi-heart"></i> and <i class="bi bi-cup-straw"></i> by consultingME
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>