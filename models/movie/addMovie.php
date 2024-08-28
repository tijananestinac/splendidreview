<?php
    require "../../config/connection.php";
    header("Content-type: application/json");
    $code = 404;
    $data = null;
   // $dir = "assets/img";
    if(isset($_POST['send'])){
        $title = $_POST['title'];
        $date = $_POST['date'];
        $runtime = $_POST['runtime'];
        $synopsis = $_POST['synopsis'];
        $ddlStudio = $_POST['ddlStudio'];
        
        /*$fileName = $_FILES['cover']['name'];
        $tmpName = $_FILES['cover']['tmp_name'];
        
        $filePath = $dir.$fileName;
        $result = move_uploaded_file($tmpName, $filePath);*/

        $priprema = $conn->prepare("INSERT INTO movie VALUES(null, :title, :release_date, :runtime, :synopsis, :cover, :idStudio");
        $priprema->bindParam(":title",$title);
        $priprema->bindParam(":date",$date);
        $priprema->bindParam(":runtime",$runtime);
        $priprema->bindParam(":synopsis",$synopsis);
        //$priprem->bindParam(":cover",$filePath);
        $priprema->bindParam(":idStudio",$ddlStudio);

        try{
            $code = $priprema->execute() ? 201 : 500;
        }catch(PDOException $e){
            var_dump($code);
            upisGresaka($e->getMessage());
        }

    }

    http_response_code($code);
    echo json_encode($data);
?>