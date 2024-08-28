<?php
    session_start();
    require "../config/connection.php";
    /*if(!isset($_SESSION['korisnik'])){
        header("Location: index.php");
    }*/
    require "fixed/head.php";
?>
    <div id="sajt">
        <?php
            require "fixed/menu.php";
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $priprema = $conn->prepare("SELECT * FROM movie WHERE idMovie = :id");
                $priprema->bindParam(":id",$id);
                $priprema->execute();
                $film = $priprema->fetch();
                //var_dump($film);
            }
            $pripremaT = $conn->prepare("SELECT * FROM trailer WHERE idMovie = :id");
            $pripremaT->bindParam(":id",$id);
            $pripremaT->execute();
            $trailer = $pripremaT->fetch();
        ?>
        <!-- film-->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 pic">
                        <img src="../<?=$film->cover;?>" alt="<?=$film->title;?>" class="img-fluid"/>
                    </div>
                    <div class="col-lg-8 text-center">
                        <iframe width="560" height="315" src="<?=$trailer->link;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h1><?=$film->title;?></h1>
                        <span class="text-secondary"><?=$film->release_date;?>, <?=$film->runtime;?> minutes</span>
                        <p class="text-justify pt-1 text-secondary"><?=$film->synopsis;?></p>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h3>'<?=$film->title?>' Movie Details</h3>
                        <table class="table table-striped table-dark text-center">
                            <tbody>
                                <tr>
                                    <td>Release Date:</td>
                                    <td><?=$film->release_date;?></td>
                                </tr>
                                <tr>
                                    <td>Genre:</td>
                                    <td ><ul id="zanr">
                                        <?php
                                            $selekcijaZanrova = $conn->query("SELECT m.idMovie as id, mg.idMovie as mgMovie, m.title, g.name FROM movie m INNER JOIN movie_genre mg on m.idMovie = mg.idMovie INNER JOIN genre g ON mg.idGenre = g.idGenre")->fetchAll();
                                            foreach($selekcijaZanrova as $zanr){
                                                if($zanr->id == $id && $zanr->id == $zanr->mgMovie){
                                                    echo "<li class='text-decoration-none'>$zanr->name</li>";
                                                }
                                            }
                                        ?>
                                    </ul></td>
                                </tr>
                                <tr>
                                    <td>Studio:</td>
                                    <?php
                                        $selectSvihStudija = $conn->query("SELECT * FROM studio")->fetchAll();
                                        //var_dump($selectSvihStudija);
                                        foreach($selectSvihStudija as $studio){
                                            if($studio->idStudio == $film->idStudio){
                                                echo "<td>$studio->name</td>";
                                            }
                                        }
                                    ?>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--review-->
        <div class="container-fluid pt-3 pb-3">
            <div class="container">
                <div class="row text-center d-flex justify-content-center">
                    <div class="col-lg-12">
                        <h3>Review</h3>
                    </div>
                    <?php
                        $pripremaR = $conn->prepare("SELECT m.idMovie, r.text, c.first_name, c.last_name FROM movie m INNER JOIN movie_review mr ON m.idMovie = mr.idMovie INNER JOIN review r ON mr.idReview = r.idReview INNER JOIN critic c ON mr.idCritic = c.idCritic WHERE m.idMovie = :id");
                        $pripremaR->bindParam(":id",$id);
                        $pripremaR->execute();
                        $review = $pripremaR->fetch();
                    // var_dump($review);   
                    
                    ?>
                    <div class="col-lg-8">
                    
                    <?php
                        if(isset($_SESSION['korisnik'])){ 
                    ?>
                        <p class="text-justify text-secondary"><?=$review->text;?></p>
                        <hr/>
                        <span class="text-secondary">written by: <?=$review->first_name;?> <?=$review->last_name;?></span>
                    <?php
                        }else{
                            ?>
                                <h3 class="pt-2">If you want to see the review please login or register.</h3>
                                <a href="login.php" class="pb-3">Login</a>
                                <a href="register.php" class="pb-3">Register</a>
                            <?php
                        }
                    ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php require "fixed/footer.php"; ?>