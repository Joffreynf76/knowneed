
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result tutorials</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">
</head>
<body>

<script src="widget.js"></script>
<script>
    var botmanWidget = {
        frameEndpoint: 'chat.html',
        introMessage: 'What you need ?',
        chatServer: 'botman.php',
        title: 'KnowBot'
    };

</script>
<header>
    <?php
    include 'header.php';
    ?>
</header>
<div class ="spacer container" style="margin-top: 7rem">
<div class="row">
    <div class="text-center col-sm-12">
        <h2>Results for : <?=$_GET['tuto']?></h2>
    </div>
</div>
<?php
if(isset($_GET['searchTuto'])){
    $db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
    $name = $_GET['tuto'];
    $sql = $db->query("SELECT * FROM resources WHERE nameResources LIKE '%$name%'")->fetchAll();

    foreach ($sql as $sqls){
        $resource = $sqls['nameResources'];


       ?>


        <div class="spacer row">
            <div class="text-center col-sm-12">
                <a href="upload/<?=$resource?>" target="_blank"><?=$resource?></a>
            </div>
            <div class="col-sm-12">
                <p><?=$sqls['description']?></p>
            </div>
        </div>
        <hr>
<?php
    }

}
?>




</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
