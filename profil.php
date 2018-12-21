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
        <div class="col-sm-10"><p class="spacer text-center titre">My informations</p></div>

    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->


            <div class="text-center">
                <?php
                $id = $_SESSION['id'];
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

                    <div class="spacer container">
                        <div class="row">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-blue btn-lg" data-toggle="modal" data-target="#resources">
                                    <i class="fas fa-edit"></i> Add Resources
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-blue btn-lg" data-toggle="modal" data-target="#modificationInfos">
                                    <i class="fas fa-edit"></i> Add Description
                                </button>

                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-blue btn-lg" data-toggle="modal" data-target="#skills">
                                    <i class="fas fa-edit"></i> Add Skills
                                </button>

                            </div>
                        </div>
                    </div>




                    <div class="spacer container skills">
                        <h3>My skills</h3>
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
                        <h3>My resources</h3>
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

                    <div class="spacer container chats">
                        <h3>My discuss</h3>
                        <?php
                        $db = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
                        $stm = $db->query("SELECT * FROM user_has_user WHERE user_idUser='$id' OR user_idUser1='$id'");
                        $data2 = $stm->fetchAll();

                        foreach ($data2 as $ref){
                            $idSender = $ref['user_idUser'];
                            $idCatcher = $ref['user_idUser1'];
                            $nameUser = $db->query("SELECT * FROM user WHERE idUser='$idSender'")->fetch();
                            $nameSender = $nameUser['firstnameUser'];

                            $nameUser2 = $db->query("SELECT * FROM user WHERE idUser='$idCatcher'")->fetch();
                            $nameCatcher = $nameUser2['firstnameUser'];

                            if($id==$idSender){
                                echo "<a href='chat.php?sender=".$ref['user_idUser']."&amp;catcher=".$ref['user_idUser1']."&amp;reference=".$ref['reference']."'>Discuss with ".$nameCatcher."</a><br><br>";
                            }else{
                                echo "<a href='chat.php?sender=".$ref['user_idUser']."&amp;catcher=".$ref['user_idUser1']."&amp;reference=".$ref['reference']."'>Discuss with ".$nameSender."</a><br><br>";
                            }





                        }
                        ?>
                    </div>






                    <!-- SECTION DES MODELS -->


                    <div class="modal fade" id="modificationInfos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add description</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">

                                        <div class="form-group">
                                            <label for="adresse">Description</label>
                                            <textarea class="form-control" rows="1" placeholder="" name="description"></textarea>
                                        </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-blue" name="modifier" value="Validate">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(isset($_POST["modifier"])) {

                        $idUser = $_SESSION['id'];
                        $description = $_POST['description'];



                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "knowledge";


                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }


                        $sql2 = "UPDATE user SET descriptionUser='$description' WHERE idUser='$idUser'";

                        $query2 = mysqli_query($conn, $sql2);

                        echo "<meta http-equiv='refresh' content='0'>";


                    }

                    ?>

                    <div class="modal fade" id="skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add skills</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="">

                                        <div class="form-group">
                                            <label for="category">Skills :</label>
                                            <select name="categorie" id="categorie">
                                                <?php
                                                $db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
                                                $category = $db->query("SELECT * FROM category")->fetchAll();
                                                foreach ($category as $categories){
                                                    echo "<option value='".$categories['idCategory']."'>".$categories['labelCategory']."</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-blue" name="Add" value="Validate">
                                    </form>

                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label for="category">Other</label>
                                                <input type="text" name="category" class="form-control">
                                            </div>
                                            <input type="submit" name="addCategory" value="Add" class="btn btn-blue">
                                        </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if(isset($_POST['Add'])){
                        $categoryId = $_POST['categorie'];
                        $query3 = $db->prepare("INSERT INTO user_has_category(user_idUser,category_idCategory) VALUES (:user,:category)");

                        $query3->bindParam(':user',$id);
                        $query3->bindParam(':category',$categoryId);

                        $query3->execute();

                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    ?>

                    <?php
                    if(isset($_POST['addCategory'])){
                        $label = $_POST['category'];
                        $query5 = $db->prepare("INSERT INTO category(labelCategory) VALUES (:label)");

                        $query5->bindParam(':label',$label);
                        $query5->execute();


                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    ?>


                    <div class="modal fade" id="resources" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Resources</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" method="POST" action="profil.php">

                                        <div class="form-group">
                                            <input type="file" name="resources">
                                        </div>

                                        <div class="form-group">
                                            <input type="date" name="date">
                                        </div>

                                        <div class="form-group">
                                            <textarea name="descriptionResources" class="form-control"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-blue" name="addResources" value="Add">
                                    </form>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_POST['addResources'])){
                    $date = $_POST['date'];
                    $pdf = $_POST['resources'];
                    $directory ='upload/';
                    $file = basename($_FILES["resources"]["name"]);
                    $ext = array('jpg', 'pdf', 'png', 'jpeg');
                    $fileExt = pathinfo($_FILES['resources']['name'], PATHINFO_EXTENSION);

                    $query4 = $db->prepare("INSERT INTO resources(nameResources,dateResources,description,user_idUser) VALUES(:name,:date,:description,:user)");
                    $query4->bindParam(':name',$_FILES['resources']['name']);
                    $query4->bindParam(':date',$date);
                    $query4->bindParam(':description',$_POST['descriptionResources']);
                    $query4->bindParam(':user',$id);

                    $query4->execute();


                    if(in_array(strtolower($fileExt),$ext)){

                        if(move_uploaded_file($_FILES['resources']['tmp_name'], $directory . $file)){
                            echo "Upload ok<br>";
                        }else{
                            echo "echec";
                        }
                    }else{
                        echo 'erreur extension';

                    }
                    echo "<meta http-equiv='refresh' content='0'>";


                }
                ?>







                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>






