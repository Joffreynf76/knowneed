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
<body>
<?php
include 'header.php';
?>
<div class="container archive rounded" style="height: 100%; padding-bottom: 20em; background-color: #3f92d2">
    <table class="table table-bordered">
        <h1 class="col font-weight-bold text-uppercase pt-2 text-white" style="text-align: center;">Archives</h1>
    </table>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
    $users = $db->query("SELECT * FROM user_has_user ")->fetchAll();
    foreach ($users as $user){

        ?>
        <table class="table table-bordered table-hover content">
            <th>
                Title
            </th>
            <th class="col">
                <a href="detailarchive.php?ref=<?php echo $user['reference'] ?>" class="table-lien"><?php echo $user['title'] ?></a>
            </th>
        </table>

        <?php
    }
    ?>
</div>

</body>
</html>