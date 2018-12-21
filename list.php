<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>List</title>
</head>
<body>

<?php
include 'header.php';


if (isset($_POST['submit'])){
    $db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
    $listing = $db->query("SELECT * FROM user_has_category WHERE category_idCategory=".$_POST['categorie'])->fetchAll();

    foreach ($listing as $list){
        $listage = $db->query("SELECT * FROM user  WHERE idUser=".$list['user_idUser'])->fetch();
        ?>
        <ul>
            <li>
                <p><?= $listage['nameUser']?></p>
                <a href="detail.php?id=<?= $listage['idUser']?>">Détail</a><br>
            </li>
        </ul>
        <?php
    }



}