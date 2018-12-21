<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result people</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleSearch.css">
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
<?php
include 'header.php';
?>

<section style="height: auto; margin-top: 7rem;margin-left: 3rem">
    <div class="row active-with-click">





<?php
if (isset($_POST['submit'])){
    $db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
    $listing = $db->query("SELECT * FROM user_has_category WHERE category_idCategory=".$_POST['categorie'])->fetchAll();

    foreach ($listing as $list){
        $listage = $db->query("SELECT * FROM user  WHERE idUser=".$list['user_idUser'])->fetch();



        ?>

        <div class="col-md-3 col-sm-6 col-xs-12" style="box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.2);">
            <article class="material-card Red">
                <h2>
                    <span><?=$listage['nameUser']." ".$listage['firstnameUser']?></span>
                    <strong>
                        <i class="fas fa-thumbs-up"></i>
                        <?=$listage['likeUser']?>
                        <i class="fas fa-thumbs-down"></i>
                        <?=$listage['dislikeUser']?>
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" src="upload/<?=$listage['picture']?>">
                    </div>
                    <div class="mc-description">
                        <?=$listage['descriptionUser']?>
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <?php
                    $ref = random_bytes(5);
                    $ref2 = bin2hex($ref);
                    $idCatcher = $listage['idUser'];
                    ?>
                    <a href='chat.php?sender=<?=$_SESSION['id']?>&amp;catcher=<?=$idCatcher?>&amp;reference=<?=$ref2?>'>Send a message</a>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick" />
                        <input type="hidden" name="hosted_button_id" value="RRLHT6HZYEZF2" />
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" class="donate" style="margin-top: -100px" />
                        <img alt="" border="0" src="https://www.paypal.com/en_FR/i/scr/pixel.gif" width="1" height="1" />
                    </form>
                </div>
            </article>
        </div>

        <?php

    }



}
?>

    </div>


</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js" defer="defer"></script>
<script src="./script.js"></script>
</body>
</html>
