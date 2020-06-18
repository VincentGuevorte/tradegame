<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../connexion.php');
require_once('../classes/proposition.php');
include('../vendor/autoload.php');
require_once('../classes/user.php');


if (isset($_POST['status'])) {

    $id = $_POST['id'];
    $status = ($_POST['status'] == 'OUI') ? 'Accepter' : 'Refuser';

    $proposition = new Proposition($bdd);
    $proposition->setId($id);
    $propositionInfo = $proposition->select();
    $result = $proposition->updateStatus($id, $status);
    $user = new User($bdd);
    $user->setId($propositionInfo['id_users']);
    $userInfo = $user->select();
    // var_dump($userInfo);
    if ($result) {

        if ($status == 'Accepter') {

            $mail = new PHPMailer(true);

            try {

                $mail->IsSMTP();
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

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
                $mail->setFrom('tradegame@echange-jeux.com', 'TradeGame');
                $mail->addAddress('' . $userInfo['email'] . '', 'Traders');
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Proposition d'echange sur tradegame";
                $mail->Body    = 'Hello Trader, le trader ' . $userInfo['firstname'] . ' souhaite echanger votre jeux contre le sien !
                 n\'hesiter plus une seule seconde et contacter le aux ' . $userInfo['telephone'] . ' a bientot sur Tradegame.';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        echo 'Le statut à bien été mise a jour';
    } else {

        echo "statut n'a pas été mise a jour";
    }
}
