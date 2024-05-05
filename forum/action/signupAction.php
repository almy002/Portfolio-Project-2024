<?php
require('action/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){

        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, lastname, firstname, pswrd)VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, lastname, firstname FROM users WHERE lastname = ? AND firstname = ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['lastname'];
            $_SESSION['firstname'] = $usersInfos['firstname'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            header('Location: index.php')

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site.";
        }

    }else{
        $errorMsg = "Veuillez compléter tout les champs.";
    }
}
?>