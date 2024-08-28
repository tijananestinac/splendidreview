<?php
    require "../config/connection.php";
    header("Content-type: application/json");
    $code = 404;
    $data = null;

    if(isset($_POST['send'])){
        $ime = $_POST['firstName'];
        $prezime = $_POST['lastName'];
        $email = $_POST['email'];
        $lozinka = $_POST['password'];

        $greske=[];
        $reIme = "/^[A-ZČĆŠĐŽ][a-zćčšđž]{3,49}(\s[A-ZČĆŠĐŽ][a-zćčšđž]{3,49})*$/";
        $rePrez = "/^[A-ZČĆŠĐŽ][a-zćčšđž]{3,49}(\s[A-ZČĆŠĐŽ][a-zćčšđž]{3,49})*$/";
        $reEmail = "/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
        $reLozinka =  "/^.{5,50}$/";

        if(!preg_match($reIme,$ime)){
            array_push($greske, "First name must begin with a capital letter, min 2 and max 50 characters.");
        }
        if(!preg_match($rePrez,$prezime)){
            array_push($greske, "Last name must begin with a capital letter, min 2 and max 50 characters.");
        }
        if(!preg_match($reEmail,$email)){
            array_push($greske, "Email must be in format: example@gmail.com");
        }
        if(!preg_match($reEmail,$email)){
            array_push($greske, "Password must have min 5 and max 50 characters.");
        }

        if(count($greske)){
            $code = 422;
            $data = $greske;
        }else{
            //$upit = "INSERT INTO user VALUES (NULL, :first_name, :last_name, :email, :password, :creation_date , 2)";
            $upit = "INSERT INTO user (idUser, first_name, last_name, email, password, idWebsiteRole) VALUES (NULL, :first_name, :last_name, :email, :password , 2)";
            $priprema = $conn -> prepare($upit);
            $priprema->bindParam(":first_name",$ime);
            $priprema->bindParam(":last_name",$prezime);
            $priprema->bindParam(":email",$email);

            $lozinka = md5($lozinka);
            $priprema->bindParam(":password",$lozinka);

            /*$date = date("Y-m-d H:i:s");
            $priprema->bindParam(":creation_date",$date);*/

            try{
               // $code = $priprema -> execute() ? 201 : 500;
                if($priprema->execute()){
                    $code = 202;
                }else{
                    $code=500;
                }
            }catch(PDOException $e){
                $code = 409;
                upisGresaka($e->getMessage());
            }

        }
        
    }

    http_response_code($code);
    echo json_encode($data);
?>