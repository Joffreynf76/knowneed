<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Profil</title>
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
<?php
include 'header.php';
?>



<div class="container bootstrap snippet profil">
    <div class="row">
        <div class="col-sm-10"><p class="spacer text-center titre">Informations</p></div>

    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <?php
                $id = $_GET['id'];
                $db4 = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
                $picture = $db4->query("SELECT picture FROM user WHERE idUser='$id'")->fetch();

                echo "<img src='upload/".$picture['picture']."' class='avatar img-circle img-thumbnail' alt='avatar'>";
                ?>
            </div></hr><br>






        </div><!--/col-3-->
        <div class="col-sm-9">

            <div class="container tab-content">
                <div class=" tab-pane active" id="Informations">
                    <hr>
                    <?php



                    $db_host = 'localhost'; // Server Name
                    $db_user = 'root'; // Username
                    $db_pass = 'root'; // Password
                    $db_name = 'knowledge'; // Database Name

                    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                    if (!$conn) {
                        die ('Failed to connect to MySQL: ' . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM user WHERE idUser='$id' ";

                    $query = mysqli_query($conn, $sql);

                    if (!$query) {
                        die ('SQL Error: ' . mysqli_error($conn));
                    }
                    while ($row = mysqli_fetch_array($query)) {

                        $id1 = $row['nameUser'];
                        $id2 = $row['firstnameUser'];
                        $id3 = $row['emailUser'];
                        $id4 = $row['passwordUser'];
                        $id5 = $row['descriptionUser'];

                        echo '<div class="row">';
                        echo '<div class="col-sm-12">';
                        echo '   <label>Name : </label> <span> ' . $id1 . '</span>';
                        echo '   </div> ' ;



                        echo '  </div>' ;

                        echo '    <div class="row"> ';
                        echo '     <div class="col-sm-12"> ' ;
                        echo '    <label>Firstname : </label> <span>' . $id2 . ' </span> ' ;
                        echo '      </div> ' ;
                        echo '    </div> ' ;

                        echo '   <div class="row"> ' ;
                        echo '    <div class="col-sm-12"> ' ;
                        echo '      <label>Email : </label> <span>' . $id3 . '</span> ';
                        echo '    </div> ' ;
                        echo '   </div> ' ;




                        echo '       <div class="row"> ' ;
                        echo '      <div class="col-sm-12"> ';
                        echo '   <label>Description : </label> <span>' . $id5 . '</span> ' ;
                        echo '       </div> ' ;
                        echo '       </div>  ';



                        echo '    </div> ' ;


                        echo '  </div> ' ;
                    }
                    ?>



                    <!-- BUTTONS ! -->






                    <div class="spacer container skills">
                        <h3>Skills</h3>
                        <ul>
                            <?php
                            $db3 = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
                            $statment = $db3->query("SELECT * FROM user_has_category WHERE user_idUser='$id'");
                            $nameCategory = $statment->fetchAll();

                            foreach ($nameCategory as $namesCategory){
                                $idCategory = $namesCategory['category_idCategory'];
                                $statment2 = $db3->query("SELECT * FROM category WHERE idCategory='$idCategory'");
                                $dataCategory = $statment2->fetchAll();

                                foreach ($dataCategory as $datasCategory){
                                    echo "<li>".$datasCategory['labelCategory']."</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="spacer container upload">
                        <h3>Resources</h3>
                        <ul>
                            <?php
                            $upload_file = $db3->query("SELECT * FROM resources WHERE user_idUser='$id'");
                            $data_upload = $upload_file->fetchAll();

                            foreach ($data_upload as $datas_upload){
                                echo "<li><a href='upload/".$datas_upload['nameResources']."' download >".$datas_upload['nameResources']."</a></li>";
                            }

                            ?>
                        </ul>
                    </div>







                    <!-- SECTION DES MODELS -->













                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>






