<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../connexion.php');
require_once('../classes/proposition.php');
include('../vendor/autoload.php');


if (isset($_POST['status'])) {

    $id = $_POST['id'];
    $status = ($_POST['status'] == 'OUI') ? 'Accepter' : 'Refuser';

    $proposition = new Proposition($bdd);
    $result = $proposition->updateStatus($id, $status);

    if ($result) {

        if ($status == 'Accepter') {

            $mail = new PHPMailer(true);

            try {

                $mail->IsSMTP();
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                //Set the hostname of the mail server
                $mail->Host = 'smtp.gmail.com';
                
                $mail->Port = 587;

                //Set the encryption mechanism to use - STARTTLS or SMTPS
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
               

                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = 'projetwebafpa@gmail.com'; // adresse mail pro 

                //Password to use for SMTP authentication
                $mail->Password = 'od020988'; // Mot de passe pro
                // Content
                $mail->setFrom('tradegame@example.com', 'Mailer');
                $mail->addAddress('v.guevorte@gmail.com', 'Joe User');
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        echo 'statut mise a jour';
    } else {

        echo "statut n'a pas été mise a jour";
    }
}
