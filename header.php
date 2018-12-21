<header>
    <nav class="navbar fixed-top" style="background-color: #3F92D2">
        <a href="index.php" class="navbar-brand" style="color: white">(K)now need</a>
        <form class="form-inline">
            <a href="tutorial.php" class="mr-sm-2" style="color: white; cursor: pointer;">Tutorials</a>
            <a href="archive.php" class="mr-sm-2" style="color: white; cursor: pointer;">Archives</a>
            <?php
            session_start();
            if(!isset($_SESSION['id'])){
                ?>
                 <a href="register.php" class="mr-sm-2" style="color: white; cursor: pointer;">Sign up</a>

                <a href="login.php" class="mr-sm-2" style="color: white; cursor: pointer">Sign in</a>
                <?php
            }
            ?>

            <?php

            if(isset($_SESSION['id'])){
                echo "<a href='profil.php' class=\"mr-sm-2\" style=\"color: white; cursor: pointer\">Profil</a>";
                echo "<a href='logout.php' class=\"mr-sm-2\" style=\"color: white; cursor: pointer\">Logout</a>";
            }
            ?>

        </form>
    </nav>
</header>
