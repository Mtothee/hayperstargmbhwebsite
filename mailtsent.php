<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './lib/phpmailer/Exception.php';
require './lib/phpmailer/PHPMailer.php';
require './lib/phpmailer/SMTP.php';

//variablen speichern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $telefonnummer = $_POST['txttelefonnummer'];
    $emailadresse = $_POST['txtemail'];
    $anliefertage = $_POST['txtanliefertage'];
    $wieware = $_POST['txtwieware'];
    $startdatum = $_POST['txtstartdatum'];
    $weitereinfos = $_POST['txtweitereinfos'];
}

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
    $mail->addAddress('m.ehrenschwendtner@gmail.com', 'Markus');     //Add a recipient
  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Neue Anfrage von Website';
    $mailbodytext = 'Du hast eine neue Anfrage erhalten. Hier die Infos: <br><br> <hr>
    Name: ' . $name . '<br>
    Telefonnummer: ' . $telefonnummer . '<br>
    E-Mail Adresse:' . $emailadresse . '<br>
    Anliefertage:' . $anliefertage . '<br>
    Warenanlieferung auf Paletten oder Rolli:' . $wieware . '<br>
    Startdatum:' . $startdatum . '<br><br>
    Weitere Informationen: ' . $weitereinfos . '
    <hr>
    <br><br>
    Ende der Nachricht.
    ';

    $mail->Body    = $mailbodytext;
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}