<?php
    if(isset($_POST['btnAddMenu'])){
        $name = $_POST['menuName'];
        $href = $_POST['href'];
        $priv = $_POST['priv'];
        require "../../config/connection.php";
        $priprema = $conn->prepare("INSERT INTO menu VALUES(NULL, :name, :href, :priv)");
        $priprema->bindParam(":name",$name);
        $priprema->bindParam(":href",$href);
        $priprema->bindParam(":priv",$priv);

        try{
            $priprema->execute();
            header("Location: ../../views/admin.php");
        }catch(PDOException $e){
            upisGresaka($e->getMessage());
        }
    }
?>