<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require "../..//connection.php";
        $priprema1 = $conn->prepare("DELETE FROM trailer WHERE idMovie = :id");
        $priprema1->bindParam(':id',$id);
        $obrisanTrailer = $priprema1->execute();
        
        $priprema2 = $conn->prepare("DELETE FROM movie_genre WHERE idMovie = :id");
        $priprema2->bindParam(':id',$id);
        $obrisanZanr = $priprema2->execute();

        if($obrisanTrailer && $obrisanZanr){
            $priprema = $conn->prepare("DELETE FROM movie WHERE idMovie = :id");
            $priprema->bindParam(':id',$id);
            $priprema->execute();
        }

        header("Location: ../../views/admin.php");

    }