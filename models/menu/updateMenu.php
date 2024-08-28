<?php
    ob_start();
    if(isset($_POST['btnUpdateMenu'])){
        require "../../config/connection.php";
        $id = $_POST['hiddenId'];
        $name = $_POST['name'];
        $href = $_POST['href'];
        $priv = $_POST['priv'];
        

        $priprema = $conn->prepare("UPDATE menu SET name = :name, href = :href, privileges = :priv WHERE idMenu = :id");
        $priprema->bindParam(":name",$name);
        $priprema->bindParam(":href",$href);
        $priprema->bindParam(":priv",$priv);
        $priprema->bindParam(":id",$id);

        try{
            $priprema->execute();
            header("Location: ../../views/admin.php");
        }catch(PDOException $e){
            upisGresaka($e->getMessage());
        }
    }
?>