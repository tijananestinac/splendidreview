<?php

    if(isset($_GET['search'])){
        $search = "%".$_GET['search']."%";
        require "../config/connection.php";
        $priprema = $conn->prepare("SELECT * FROM movie WHERE title LIKE :search");
        $priprema->bindParam(":search",$search);
        
        $priprema->execute();
        $filmovi = $priprema->fetchAll();

        $json = json_encode([
            "uspeh" => "da",
            "filmovi" => $filmovi
        ]);
            
        echo $json;
        header("Content-Type: application/json");
    }
?>
        