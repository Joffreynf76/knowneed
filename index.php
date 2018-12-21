
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleIndex.css">
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
<?php
include 'header.php';
?>
<section id="searchSection" class="container w-100">
    <div class="row align-items-center h-100">
        <div class="col-md-8" style="margin: 0 auto;">

                <img src="knowFinal.svg" alt="oui" height="200px" width="49%" style="display: inline">

                <img src="needFinal.svg" alt="oui" height="200px" width="49%" style="display: inline">
            <!--<img src="https://trello-attachments.s3.amazonaws.com/5c178ab7abe1c2656e09b7f2/5c178b63cb14736be49b0a46/faaebdd7515495dd6133d410f3fa0218/logo_bd.svg" alt="oui" height="200px" width="700px">-->
            <p id="homeSentence" style="margin-top: 30px">The fastest way to learn about development</p>
            <form id="searchForm" method="get" action="searchTuto.php">
                <label for="searchForm" style="color: white">Start looking for a tutorial now</label>
                <input id="searchForm" class="search form-control form-control-lg" type="text" placeholder="Type your request" name="tuto">
                <div class="row justify-content-center">
                    <button type="submit" name="searchTuto" class="btn btn-secondary btn-lg" style="border-radius: .3rem; padding: 1rem 3rem; margin-bottom: 20px; margin-right: 30px">Search</button>
                    <button type="button" id="searchPersons" class="btn btn-secondary btn-lg" style="border-radius: .3rem; padding: 1rem 3rem; margin-bottom: 20px">Search for people</button>
                </div>
                <!--<button type="submit" class="icoSend"><i class="fas fa-angle-right fa-3x"></i></button>-->
            </form>
            <form id="tagForm" method="POST" action="searchPeople.php"style="display: none">
                <label for="technologySelect" style="color: white">Start now by selecting your category</label>
                <?php
                $db = new PDO('mysql:host=localhost;dbname=knowledge','root','root');
                $category = $db->query("SELECT * FROM category")->fetchAll();
                ?>
                <select id="technologySelect" class="form-control form-control-lg" style="margin-bottom: 25px" name="categorie">
                    <?php
        foreach ($category as $categories){
            echo "<option value='".$categories['idCategory']."'>".$categories['labelCategory']."</option>";
        }
        ?>
                </select>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-secondary btn-lg" style="border-radius: .3rem; padding: 1rem 3rem; margin-bottom: 20px" name="submit">Search</button></button>
                </div>
            </form>


        </div>
    </div>
</section>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js" defer="defer"></script>
<script src="./script.js"></script>
</body>
</html>