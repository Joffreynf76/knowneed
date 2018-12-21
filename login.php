<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="connexionAdmin.css">
    <title>Login</title>
</head>
<body>
<?php
include 'header.php';
?>


<div class="container login">
    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
        <div class="main-div"style="border: 1px solid lightgray;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.2);">
            <div class="panel">
                <h2>Login Page</h2>
                <p>Please enter your email and password</p>
            </div>
            <form id="Login" method="post" action="">

                <div class="form-group">


                    <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" name="mail">

                </div>

                <div class="form-group">

                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

                </div>

                <button type="submit" class="btn btn-primary" name="submit">Login</button>

            </form>
        </div>

    </div>
</div>

<?php
$db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
if (isset($_POST['submit'])){
    $mail = $_POST['mail'];
    $mdp = $_POST['password'];
    $connection = $db->query("SELECT * FROM user WHERE emailUser= '$mail'")->fetch();

    if (password_verify($mdp,$connection['passwordUser']) == true){
        session_start();
        $_SESSION['mail'] = $connection['emailUser'];
        $numberConnection = $connection['loginUser'] + 1 ;
        $_SESSION['id'] = $connection['idUser'];
        $id= $_SESSION['id'];

        $nbrConnection = $db->query("UPDATE user SET loginUser = $numberConnection WHERE user.idUser = $id;");
        ?>
        <script>
            alert("Login success");
            document.location.href="http://localhost:8888/knowledge/index.php";
        </script>
<?php
    }else{
        echo "Erreur lors de la connexion";
    }

}

?>
</body>
</html>
