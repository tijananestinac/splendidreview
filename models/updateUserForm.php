<?php
    session_start();
    if(!isset($_SESSION['korisnik'])){
        header("Location: index.php");
    }else{
        $korisnik = $_SESSION['korisnik'];
        if($korisnik->RoleName != "admin"){
            header("Location: index.php");
        }
    }
    require "../config/connection.php";
    require "../views/fixed/head.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $priprema = $conn->prepare("SELECT * FROM user WHERE idUser = :id");
        $priprema->bindParam(":id",$id);
        $priprema->execute();
        $korisnik = $priprema->fetch();
        var_dump($korisnik);
    }
?>
<div id="sajt">
    <?php require "../views/fixed/menu.php";?>
    <div class="container-fluid text-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                <h4>Update user</h4>
                <form action="user/updateUser.php" method="post">
                    <input type="hidden" name="hiddenId" value="<?=$id;?>"/>
                    <table class="table table-striped table-dark">
                        <thead>
                            <th>Category</th>
                            <th>Values</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label for="fname">First Name</label></td>
                                <td><input type="text" name="fname" id="fname" class="form-control" value="<?=$korisnik->first_name;?>"></td>
                            </tr>
                            <tr>
                                <td><label for="lname">Last Name</label></td>
                                <td><input type="text" name="lname" id="lname" class="form-control" value="<?=$korisnik->last_name;?>"></td>
                            </tr>
                            <tr>
                                <td><label for="email">First Name</label></td>
                                <td><input type="text" name="email" id="email" class="form-control" value="<?=$korisnik->email;?>"></td>
                            </tr>
                            <tr>
                                <td><label for="role">Role</label></td>
                                <td><input type="text" name="role" id="role" class="form-control" value="<?=$korisnik->idWebsiteRole;?>"></td>
                            </tr>
                            <tr>
                                <td>Click to update</td>
                                <td><input type="submit" name="btnUpdateUser" value="UPDATE" class="form-control btn btn-warning"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "../views/fixed/footer.php"; ?>

