<?php

$pdo = new PDO('mysql:host=cantal.o2switch.net;dbname=jhtl3483_test', 'jhtl3483_jhtl3483', 'm=zqhYy!UjWh');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

include "mail/confirmation_mail.php";

if(isset($_POST['send'])){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        if( !preg_match('#^[0-9a-zA-Z._\-]+@[0-9a-zA-z._\-]{2,}\.[a-zA-Z]{2,4}$#',$email)){
            $_SESSION['error'] = "Adresse électronique incorrecte !";
            var_dump($email);
            exit();
        }else{
            $checker = FALSE;
            $sql = "SELECT email FROM usersss";
            $req_check = $pdo->prepare($sql);
            $req_check->execute();
            while( $result = $req_check->fetch() ){
                if ( $result['email'] == $email ){
                    $checker = TRUE;
                    break;
                }
            }
            $req_check->closeCursor();
            
            if ( $checker ){
                $_SESSION['success'] = 'Votre adresse email est déjà enregistrée, nous vous contacterons dès que le site sera terminé. Merci pour votre intérêt !';
            }else{
                $sujet = "Bienvenue dans les mythes contemporains !";
                $dom=new DOMDocument();
                $dom->loadHTMLFile('test.html');
                if ( !envoyer_mail($email, $sujet, $dom->saveHTML() ) ){
                    $_SESSION['error'] = 'Une erreur s\'est produite lors de l\'envoi du courrier. Veuillez essayer à nouveau !';
                }else{
                
                    $sql = "INSERT INTO usersss(email) VALUES(:email)";
                    $req = $pdo->prepare($sql);
                    $req->execute(array(
                        'email' => $email
                    ));
                    $req->closeCursor();
                    $_SESSION['success'] = 'Envoi du formulaire réussi !';
                    
                }
            }
        }
    }
    header("Location: index.php");
}
