<?php  
    if(isset($_GET['id'])){
        $id  = $_GET['id'];
        require "../../config/connection.php";
        $priprema = $conn->prepare("DELETE FROM menu WHERE idMenu = :id");
        $priprema->bindParam(":id",$id);
        $priprema->execute();
        header("Location: ../../views/admin.php");
    }