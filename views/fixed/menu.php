<div class="container-fluid">
        <div class="container d-flex justify-content-between pt-3 pb-2">
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
                                $ispis.= "<li><a href='{$li->href}' class='text-decoration-none text-secondary'>{$li->name}</a></li>";
                            }
                                if($ulogovan){
                                    if($li->privileges==2){
                                        if($korisnik->idWebsiteRole!=1 && $li->name=="Admin"){
                                            $ispis.="";
                                        }else{
                                            $ispis.="<li><a href='{$li->href}' class='text-decoration-none text-secondary'>{$li->name}</a></li>";
                                        }
                                    }
                                }
                            else{
                                if($li->privileges==1){
                                    $ispis.="<li><a href='{$li->href}' class='text-decoration-none text-secondary'>{$li->name}</a></li>";
                                }
                            }  
                        }

                        if($ulogovan){
                            $ispis.="<li><a href='../logout.php' class='text-decoration-none text-secondary'>Logout</a></li>";
                        }
                        
                        $ispis.="</ul>";
                        echo $ispis;
                    ?>
                </nav>
            </div>
        </div>
    </div>