<?php
    session_start();
    require "../config/connection.php";
    require "fixed/head.php";
    
?>
    <div id="sajt">
        <?php require "fixed/menu.php"; ?>
        <div class="container-fluid">
            <div class="container">
                <div class="row pt-2" id="autor">
                    <div class="col-12">
                        <h2 class="text-center">Author</h2>
                    </div>
                </div>
                <div class="row pt-4 d-flex justify-content-space-around">
                    <div class="col-lg-4 col-12 pb-5" id="slikaAutor">
                        <img src="../assets/img/autor.png" alt="Author" class="img-fluid"/>
                    </div>
                    <div class="col-lg-8 col-12">
                        <p class="text-justify text-secondary">My name is Tijana Neštinac, i was born on March 11th 2000 in Belgrade. My hometown is Inđija where i finished middle school as well as high school. I'm currently attending ICT College, my major Internet Technologies (identification: 93/18). In free time i like to read books, watch movies and tv shows. 
                        </p>
                        <p class="text-secondary">This is link to my portfolio. Please check it out! <a href="https://tijananestinac.github.io/portfolio/" target="_blank">Portfolio</a></p>
                        <p class="text-secondary">You can also find me on social media: <a href="https://www.facebook.com/tijana.nestinac" class="blue-text" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/tijana.nestinac/?hl=sr" class="pink-text" target="_blank"><i class="fab fa-instagram"></i></a>
                        </p>                    
                        <a href="../models/wordAuthor.php">Download</a>        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "fixed/footer.php"; ?>