<?php
    ob_start();
    if(isset($_POST['btnUpdateUser'])){
        require "../../config/connection.php";
        $id = $_POST['hiddenId'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $priprema = $conn->prepare("UPDATE user SET first_name = :fname, last_name = :lname, email = :email, idWebsiteRole = :role WHERE idUser = :id");
        $priprema->bindParam(":fname",$fname);
        $priprema->bindParam(":lname",$lname);
        $priprema->bindParam(":email",$email);
        $priprema->bindParam(":role",$role);
        $priprema->bindParam(":id",$id);

        try{
            $priprema->execute();
            header("Location: ../../views/admin.php");
        }catch(PDOException $e){
            upisGresaka($e->getMessage());        
        }
    }
?>