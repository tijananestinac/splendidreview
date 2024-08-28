<?php
    if(isset($GET['id'])){
        $id = $GET['id'];
        require "../../config/connection.php";
        $priprema = $conn->prepare("DELETE FROM user WHERE idUser = :id");
        $priprema->bindParam(':id',$id);
        $priprema->execute();
        header("Location: ../../views/admin.php");
    }
?>