<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="chat.css">
    <title>Chat</title>
</head>
<body>

<?php
include 'header.php';
?>
<div class="container chat2">
    <div class="row">
        <div class="col">

<?php
if(!isset($_SESSION['id'])){
    echo "Please login";
} else {
    $db = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
    $catcher = $_GET['catcher'];
    $sender = $_GET['sender'];
    $sqlSender = $db->query("SELECT * FROM user WHERE idUser='$catcher'")->fetch();
    $sqlCatcher = $db->query("SELECT * FROM user WHERE idUser='$sender'")->fetch();

    if($_SESSION['id']==$catcher){
        echo "<h2 class='text-center mt-2'>Chat with ".$sqlCatcher['firstnameUser']." ".$sqlCatcher['nameUser']."</h2>";
    }else {
        echo "<h2 class='text-center mt-2'>Chat with ".$sqlSender['firstnameUser']." ".$sqlSender['nameUser']."</h2>";
    }



    ?>

    <div class="chat text-center rounded">
    <?php


    $reference = $_GET['reference'];
    $data = $db->query("SELECT * FROM user_has_user WHERE reference='$reference' ");

    $result = $data->fetch();

    echo "<h4>" . $result['title'] . "</h4>";
    echo "<p>" . $result['message'] . "</p>";
    ?>

    <form method="post" action="">
        <div class="form-group">
            <?php
            if (!isset($result['title'])) {
                ?>

                <label for="titre">Title :
                    <input type="text" name="titre" class="form-control"></label>
                <?php
            }
            ?>
        </div>
        <div class="form-group">

            <textarea name="message" class="form-control" placeholder="Write your message here"></textarea>
        </div>
        <?php
        if (!isset($result['message'])) {

            echo "<input type='submit' name='send' value='Send' class='btn btn-info mb-2'>";
        }
        if (isset($result['message'])) {

            echo "<input type=\"submit\" name=\"refresh\" value=\"Send\" class='btn btn-info mb-2'>";
        }

        ?>
        <input type="submit" name="like" value="Like" class="btn btn-success mb-2">
        <input type="submit" name="dislike" value="Dislike" class="btn btn-danger mb-2">
    </form>
    </div>


    <?php
    $db1 = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
    $message = $_POST['message'];
    if($_SESSION['id']==$catcher){

        $message3 = $sqlSender['firstnameUser']." : ".$message;
    }else {
        $message3 = $sqlCatcher['firstnameUser']." : ".$message;
    }

    $titre = $_POST['titre'];
    $sender = $_GET['sender'];
    $catcher = $_GET['catcher'];
    $reference = $_GET['reference'];


    if (isset($_POST['send'])) {

        $stm = $db1->prepare("INSERT INTO user_has_user(user_idUser,user_idUser1,message,title,reference) VALUES (:sender,:catcher,:message,:titre,:reference)");

        $stm->bindParam(':sender', $sender);
        $stm->bindParam(':catcher', $catcher);
        $stm->bindParam(':message', $message3);
        $stm->bindParam(':titre', $titre);
        $stm->bindParam(':reference', $reference);


        $stm->execute();


        echo "Message envoyé avec succès";
        echo "<meta http-equiv='refresh' content='0'>";


    }

    if (isset($_POST['refresh'])) {

        if($_SESSION['id']==$catcher){

            $message2 = $result['message'] . "<br><br>" . $sqlSender['firstnameUser']." : ".$message;
        }else {
            $message2 = $result['message'] . "<br><br>" . $sqlCatcher['firstnameUser']." : ".$message;
        }

        $stm2 = $db->query("UPDATE user_has_user SET message='$message2' WHERE reference='$reference'");

        $stm2->execute();

        echo "<meta http-equiv='refresh' content='0'>";
    }

    if (isset($_POST['like'])) {

        $stm4 = $db->query("SELECT * FROM user WHERE idUser='$catcher'");
        $likeUser = $stm4->fetchColumn(8);

        $likeUser += 1;

        $stm3 = $db->query("UPDATE user SET likeUser='$likeUser' WHERE idUser='$catcher'");

        $stm3->execute();

        echo "<meta http-equiv='refresh' content='0'>";


    }

    if (isset($_POST['dislike'])) {

        $stm5 = $db->query("SELECT * FROM user WHERE idUser='$catcher'");
        $dislikeUser = $stm5->fetchColumn(9);

        $dislikeUser += 1;

        $stm6 = $db->query("UPDATE user SET dislikeUser='$dislikeUser' WHERE idUser='$catcher'");

        $stm6->execute();

        echo "<meta http-equiv='refresh' content='0'>";


    }


}
?>
    </div>
    </div>

</div>


</body>
</html>