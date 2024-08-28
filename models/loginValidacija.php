<?php 
    session_start();
    require "../config/connection.php";
    header("Content-type: application/json");
    $code = 404;
    $data = null;

    if(isset($_POST['send'])){
        $email = $_POST['email'];
        $lozinka = $_POST['password'];

        $greske = [];

        $reEmail =  "/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
        $reLozinka =  "/^.{5,50}$/";

        if(!preg_match($reEmail,$email)){
            array_push($greske,"Email isn't valid.");
        }

        if(!preg_match($reLozinka,$lozinka)){
            array_push($greske,"Password isn't valid.");
        }

        if(count($greske) == 0){
            $priprema = $conn -> prepare("SELECT u.idUser, u.email,wr.idWebsiteRole, wr.name as RoleName FROM user u INNER JOIN website_role wr ON u.idWebsiteRole = wr.idWebsiteRole WHERE email = :email AND password = :password");
            $priprema->bindParam(":email",$email);
            $lozinka = md5($lozinka);
            $priprema->bindParam(":password",$lozinka);
            try{
                $code = $priprema->execute() ? 201 : 500;
                if($priprema->rowCount()==1){
                    $korisnik = $priprema->fetch();
                    $_SESSION['korisnik'] = $korisnik;  
                }else{
                    $_SESSION['greske'] = ["User not found."];
                    $mail = new PHPMailer(true);
                }
            }catch(PDOException $e){
                $code = 409;
                upisGresaka($e->getMessage());
            }

        }else{
            $code = 422;
            $data = $greske;
            $_SESSION['greske'] = $greske;
        }
    }

    http_response_code($code);
    echo json_encode($data);
?>