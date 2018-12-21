<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styleArchive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Archives</title>
</head>
<body style="background-color: white">
<?php
include 'header.php';
?>
<div class="container rounded" style="padding-bottom: 20em; background-color: #3f92d2;margin-top: 7rem">
    <?php
    $db = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
    $users = $db->query("SELECT * FROM user_has_user")->fetchAll();

    foreach ($users as $user){
        if (!empty($_GET['ref']) && $_GET['ref'] === $user['reference']){ ?>
            <h1 style="text-align: center; padding: 50px 0 75px 0;color: white" class="font-weight-bold	 text-uppercase	"><?php echo $user['title'] ?></h1>
            <table class="col-12" style="text-align: center"><td><?php echo $user['message'] ?></td></table>'
            <?php
        }
    }
    ?>
</div>

</body>
</html>