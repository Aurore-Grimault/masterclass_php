<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: login.php');
} else {
    require("../config/db.php");
    $addname = filter_var($_POST['addname'], FILTER_SANITIZE_SPECIAL_CHARS);
    print_r($user['id']);
    $stmt = $dbh->prepare('UPDATE user SET name=($_POST[addname]) WHERE id=$_POST[id]');
    // "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
    $stmt->execute();
    echo 'mise à jour du prénom effectuée';


}