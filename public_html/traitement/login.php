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
        $data['password'] = $password;
    }

    if ($data['isSuccess'] == true) {
        require('../config/db.php');
        $stmt = $dbh->prepare("SELECT * FROM user WHERE email='$data[email]'");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        // print_r($count);

        if ($count == 0) {
            echo "vous n'êtes pas enregistré sur notre site";
        } else {
            if (password_verify($data['password'], $user['password'])) {
                echo 'Le mot de passe est valide !';
                echo "<h1>Bienvenue " . $user['name'] . "</h1>";
                include('../formname.php');
            } else {
                echo 'Le mot de passe est invalide.';
            }

        }
    }
}
