<?php

if ( !isset($_SESSION['id_user']) ){
    header("Location: .php");
}else if ( isset($_POST['send_invit']) ){
    
    // Getting the user's email
    $sql = "SELECT email FROM utilisateur WHERE id='{$_SESSION['id_user']}'";
    $req = mysqli_query($conn, $sql);
    if( !$req ){
        exit("Error : ". $sql . "<br>". mysqli_error($conn));
    }
    $result = mysqli_fetch_assoc($req);
    $sujet = '';
    $message = '<html>
                    <body>
                        <a href="#">link</a>
                    </body>
                </html>';

    if ( !envoyer_mail($result['email'], $sujet, $message) ){
        $_SESSION['error'] = '';
    }else{
        unset($_SESSION['inscrit']);
    }
}