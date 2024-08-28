    <div class="container-fluid">
        <div class="container ">
            <div class="row d-flex justify-content-between pt-3 pb-2">
                <div class="col-lg-4 d-flex justify-content-center">
                    <p><a href="index.php" class='text-decoration-none text-secondary'><i class="fas fa-film"></i> SPLENDID REVIEWS</a></p>
                </div>
                <div class="col-lg-8 text-decoration-none">
                    <nav>
                        <?php
                            $upitMeni = "SELECT * FROM menu";
                            $pripremaMeni = $conn->prepare($upitMeni);
                            $pripremaMeni->execute();
                            $meni = $pripremaMeni->fetchAll();
                            $ulogovan = false;

                            if(isset($_SESSION['korisnik'])){
                                $ulogovan = true;
                                $korisnik = $_SESSION['korisnik'];
                            }

                            $ispis = "<ul id='menu'>";
                            foreach($meni as $li){
                                if($li->privileges==0){
                                    $ispis.= "<li><a href='views/{$li->href}' class='text-decoration-none text-secondary'>{$li->name}</a></li>";
                                }
                                    if($ulogovan){
                                        if($li->privileges==2){
                                            if($korisnik->idWebsiteRole!=1 && $li->name=="Admin"){
                                                $ispis.="";
                                            }else{
                                                $ispis.="<li><a href='views/{$li->href}' class='text-decoration-none text-secondary'>{$li->name}</a></li>";
                                            }
                                        }
                                    }
                                else{
                                    if($li->privileges==1){
                                        $ispis.="<li><a href='views/{$li->href}' class='text-decoration-none text-secondary'>{$li->name}</a></li>";
                                    }
                                }  
                            }

                            if($ulogovan){
                                $ispis.="<li><a href='logout.php' class='text-decoration-none text-secondary'>Logout</a></li>";
                            }
                            
                            $ispis.="</ul>";
                            echo $ispis;
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="slider">
        <div class="container pt-2">
            <div class="row">
                <div class="col-lg-4 text-justify pt-5">
                    <h2 class="text-center text-dark">WELCOME TO OUR MOVIE REVIEW</h2>
                    <p class="text-dark">We are a small group of people that adore movies and always wanted to participate in movie comunity somehow. So we decided to start our own review website. Our critics are higly educated and open minded. I hope you'll like us. Let's get to it!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container d-flex justify-content-around pt-2 text-justify">
            <div class="row">
                <?php
                    $brojFilmova = 4;
                    $odstupanje = 4;
                    $upit = "SELECT * FROM movie LIMIT :lim OFFSET :odstupanje";
                    $priprema = $conn->prepare($upit);
                    $priprema->bindParam(':odstupanje',$odstupanje,PDO::PARAM_INT);
                    $priprema->bindParam(':lim',$brojFilmova,PDO::PARAM_INT);
                    $izvrsi = $priprema->execute();
                    $sviFilmovi = $priprema->fetchAll();
                    //var_dump($sviFilmovi);

                    foreach($sviFilmovi as $film):
                ?>
                <div class="col-lg-3 slika text-center okvir">
                    <a href="views/review.php?id=<?=$film->idMovie;?>"><img src="<?=$film->cover?>" alt="<?=$film->title?>" class="img-fluid pb-2"/></a>
                    <h3><?=$film->title?></h3>
                    <p class="text-secondary text-justify"><?=$film->quote?></p>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5 pt-3">
        <div class="container d-flex justify-content-around pt-2 text-center">
            <div class="col-lg-4 slika text-center">
                <h3>Who are we?</h3>
                <p class="text-justify pt-2 text-secondary">We are an independent third party that writes reviews about the hottest movies our right now. Our critics Jane, John, Katherine and Michael are all highly educated on all things movies. I hope you're gonna enjoy our reviews.</p>
            </div>
            <div class="col-lg-4 pr-3">
                <h3 class="text-center">What we do?</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-warning">We offer all the information you need about the hottest movies right now</li>
                    <li class="list-group-item bg-warning">Our review are detail orianted</li>
                    <li class="list-group-item bg-warning">Our critics all graduated from Film Making University</li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="container d-flex justify-content-center pt-2 text-center">
            <div class="col-lg-4">
                <h5>Useful Links</h5>
                <ul id="footer" class="pt-3">
                    <li><a href="https://www.facebook.com" class="text-secondary" target="_blank"><i class='fab fa-facebook-f'></i></a></li>
                    <li><a href="https://twitter.com/" class="text-secondary" target="_blank"><i class='fab fa-twitter'></i></a></li>
                    <li><a href="https://www.instagram.com" class="text-secondary" target="_blank"><i class='fab fa-instagram'></i></a></li>
                    <li><a href="sitemap.xml" target="_blank" class="text-secondary"><i class="fas fa-sitemap"></i></a></li>
                </ul>
                <p class="text-secondary">Copyright&copy;2020 All Rights Reserved</p>
                <p class="text-secondary"><a href="documentation.pdf" class="text-secondary" target="_blank">Documentation</a></p>
            </div>
        </div>
    </div>