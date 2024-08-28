<?php
    ob_start();
    if(isset($_POST['btnGenre'])){
        $genre = $_POST['genre']; 
        require "../../config/connection.php";
        $priprema = $conn->prepare("INSERT INTO genre VALUES (NULL, :genre)");
        $priprema->bindParam(":genre",$genre);
        try{
            $priprema->execute();
            header("Location: ../../views/admin.php");
        }catch(PDOException $e){
            upisGresaka($e->getMessage());
        }
        
    }
?>