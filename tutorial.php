<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Tutorials</title>
</head>
<body>
<?php
include 'header.php';
?>

<div class="container my-3 text-center tuto rounded pr-0">

    <div class="row">
        <div class="col">
            <h2 class="h4 text-white mb-0 p-4" style="background-color: #3F92D2;width: 100%">Tutorials</h2>
            <table class="table">
                <thead class="thead-light">
                    <tr><td>Title</td><td>Author</td><td>Date</td></tr>

                </thead>
                <tbody>
                <?php
                $db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
                $resources = $db->query("SELECT * FROM resources")->fetchAll();

                foreach ($resources as $resource){
                    ?>

                <tr>
                    <td>
                        <h3 class="h5 mb-0"><a href="upload/<?=$resource['nameResources']?>" target="_blank"><?=$resource['nameResources']?></a></h3>
                        <p class="mb-0"><?=$resource['description']?></p>
                    </td>

                    <td>
                        <?php
                        $userName = $db->query("SELECT * FROM user WHERE idUser=".$resource['user_idUser'])->fetchAll();

                        foreach ($userName as $userNames){
                            echo "<div><a href='detail.php?id=".$userNames['idUser']."'>".$userNames['nameUser']." ".$userNames['firstnameUser']."</a></div>";
                        }
                        ?>



                    </td>
                    <td><?=$resource['dateResources']?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
