<?php
    if(isset($_POST['btnUpdate'])){
        $id = $_POST['hiddenId'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $synopsis = $_POST['synopsis'];
        $studio  = $_POST['ddlStudio'];
        $genre = $_POST['genre'];

        require "../../config/connection.php";
        $priprema = $conn->prepare("UPDATE movie SET title = :title, release_date = :date, runtime = :time, synopsis = :synopsis, idStudio = :idStudio WHERE idMovie = :id");
        $priprema->bindParam(":title",$name);
        $priprema->bindParam(":date",$date);
        $priprema->bindParam(":time",$time);
        $priprema->bindParam(":synopsis",$synopsis);
        $priprema->bindParam(":idStudio",$studio);
        $priprema->bindParam(":id",$id);

        $priprema1 = $conn->prepare("UPDATE movie_genre SET idGenre = :genre WHERE idMovie = :id");
        $priprema1->bindParam(":genre",$genre);
        $priprema1->bindParam(":id",$id);

        try{
            $updatedMovie = $priprema->execute();
            $updatedGenre = $priprema1->execute();
            header("Location: ../../views/admin.php");
        }catch(PDOException $e){
            upisGresaka($e->getMessage());
        }

    }    
?>