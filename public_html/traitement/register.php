<?php
// print_r($data);
// if(!isset($_POST['formLogin'])) {
// header('Location: index.php');
// }
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
} else {
    $data = ["email" => "", "password" => "", "isSuccess" => true, "msgError" => ""];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ($email == false) {
        $data['msgError'] = "<p>Votre email n'est pas valide !!</p>";
        $data['isSuccess'] = false;
        echo $data['msgError'];
    } else {
        $data['email'] = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $data['msgError'] = "<p>le mot de passe ne peut pas être vide !!</p>";
        $data['isSuccess'] = false;
        echo $data['msgError'];
    } else {
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        
    }

    if ($data['isSuccess'] == true) {
        require('../config/db.php');
        $stmt = $dbh->prepare("SELECT * FROM user WHERE email='$data[email]'");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        // print_r($count);

        if ($count == 1) {
            echo "<h1>l'adresse e-mail existe déjà </h1>";
        } else {
            $stmt = $dbh->prepare("INSERT INTO user (email, password) VALUES (:email,:password)");
            $stmt->bindValue(':email', $data['email'],PDO::PARAM_STR);
            $stmt->bindValue(':password', $data['password'],PDO::PARAM_STR);
            $stmt->execute();
            echo "<h1>vous êtes bien inscrit sur notre site </h1>";
        }
    }





}
