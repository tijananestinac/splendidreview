<?php
    session_start();
    ob_start();
    require "../config/connection.php";
    require "fixed/head.php";
    //require "fixed/menu.php";
    /*if(!isset($_SESSION['korisnik'])){
        header("Location: index.php");
    }*/

?>
    <div id="sajt">
        <?php
            require "fixed/menu.php";
            $upitFilmovi = "SELECT * FROM movie";
            $pripremaF = $conn->prepare($upitFilmovi);
            $izvrsiF = $pripremaF->execute();
            $ukupnoFilmova = $pripremaF->rowCount();
            $brojFilmovaPoStranici = 9;
            $odstupanje = 0;

            if(isset($_GET['page'])){
                $odstupanje = ($_GET['page'] - 1) * $brojFilmovaPoStranici;
            }

            $upit = "SELECT * FROM movie LIMIT :lim OFFSET :odstupanje";
            $priprema = $conn->prepare($upit);
            $priprema->bindParam(":lim",$brojFilmovaPoStranici,PDO::PARAM_INT);
            $priprema->bindParam(":odstupanje",$odstupanje,PDO::PARAM_INT);
            $izvrsi = $priprema->execute();
            $sviFilmovi = $priprema->fetchAll();
            $brojStrana = ceil($ukupnoFilmova/$brojFilmovaPoStranici); 

            $upitZanr = "SELECT * FROM genre";
            $pripremaZ = $conn->prepare($upitZanr);
            $izvrsiZ = $pripremaZ->execute();
            $sviZanrovi = $pripremaZ->fetchAll();
            //var_dump($sviZanrovi);

            $joinUpit = "SELECT m.idMovie as movie, g.idGenre as genre, mg.idMovie as gMovie , mg.idGenre as gGenre, m.title, m.cover, name as genreName FROM movie m INNER JOIN movie_genre mg ON m.idMovie = mg.idMovie INNER JOIN genre g ON mg.idGenre = g.idGenre";
            $pr = $conn->prepare($joinUpit);
            $izvrsiJ = $pr->execute();
            $zanrFilm = $pr->fetchAll();
            //var_dump($zanrFilm);

        ?>
        <div class="container-fluid">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-4">
                        <h1>Movies</h1>
                        <a href="../models/excelMovie.php" class="text-light">Download info about movies from our website</a>
                    </div>
                   
                    <div class="col-lg-4">
                        <form action="">
                            <input type="text" name="search" id="search" placeholder="Search movies by movie name..." class="form-control mt-2"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <div class="container">
                <div class="row" id="filmovi">
                    <?php foreach($sviFilmovi as $film):?>
                    <div class="col-lg-4 slika text-center">
                        <a href="review.php?id=<?=$film->idMovie;?>"><img src="../<?=$film->cover?>" alt="<?=$film->title?>" class="img-fluid pb-3"/></a>
                        <h3><?=$film->title?></h3>
                        <p class="text-secondary text-justify"><?=$film->quote?></p>
                    </div>
                    <?php endforeach;?>  
                </div>
            </div>
        </div>
        <!--Choose a page-->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" id="pages">
                        <p class="text-white">Page: 
                            <?php
                                for($i=0;$i<$brojStrana;$i++):
                            ?>
                                <a href="<?=$_SERVER['PHP_SELF'] . "?page=" . ($i + 1)?>" class="text-warning"><?=$i+1?></a>
                            <?php endfor; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "fixed/footer.php"; ?>