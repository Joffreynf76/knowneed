
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="connexionAdmin.css">
    <title>Register</title>
</head>
<body>
<?php
include 'header.php';
?>


<div class="container" style="margin-top: 40px">
    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
        <div class="main-div"style="border: 1px solid lightgray;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.2);">
            <div class="panel">
                <h2>Register Page</h2>
                <p>Please enter your information for the registration</p>
            </div>
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">


                    <input type="text" class="form-control" id="inputEmail" placeholder="Name" name="name">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" id="inputPassword" placeholder="FirstName" name="fname">

                </div>
                <div class="form-group">

                    <input type="email" class="form-control" id="inputPassword" placeholder="Email Address" name="mail">

                </div>
                <div class="form-group">

                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

                </div>

                <div class="form-group">
                    <label for="picture">Picture</label>

                    <input type="file" class="form-control" name="picture">

                </div>

                <button type="submit" class="btn btn-primary" name="submit">Register</button>

            </form>
        </div>

    </div>
</div>


<?php
$db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mail = $_POST['mail'];
    $mdp = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $directory ='upload/';
    $file = basename($_FILES["picture"]["name"]);
    $ext = array('jpg','png', 'jpeg');
    $fileExt = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

    $inscription = $db->query("INSERT INTO user (nameUser, firstnameUser, emailUser, passwordUser,picture) VALUES ('$name', '$fname', '$mail', '$mdp','$file');");


    if(in_array(strtolower($fileExt),$ext)){

        if(move_uploaded_file($_FILES['picture']['tmp_name'], $directory . $file)){
            echo "Upload ok<br>";
        }else{
            echo "echec";
        }
    }else{
        echo 'erreur extension';

    }
    ?>
    <script>
        alert("Successful registration");
        document.location.href="http://localhost:8888/knowledge/login.php";
    </script>
<?php
}
?>

</body>
</html>