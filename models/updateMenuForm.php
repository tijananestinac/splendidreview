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
        $priprema = $conn->prepare("SELECT * FROM menu WHERE idMenu = :id");
        $priprema->bindParam(":id",$id);
        $priprema->execute();
        $menu = $priprema->fetch();
    }
?>
<div id="sajt">
    <?php require "../views/fixed/menu.php"; ?>
    <div class="container-fluid pt-3 pb-3">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <form action="menu/updateMenu.php" method="post">
                    <input type="hidden" name="hiddenId" value="<?=$id;?>"/>
                        <table class="table table-striped table-dark text-center">
                            <thead>
                                <th>Category</th>
                                <th>Values</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="name">Name</label></td>
                                    <td><input type="text" name="name" id="name" class="form-control" value="<?=$menu->name;?>"></td>
                                </tr>
                                <tr>
                                    <td><label for="href">Href</label></td>
                                    <td><input type="text" class="form-control" name="href" id="href" value="<?=$menu->href;?>"></td>
                                </tr>
                                <tr>
                                    <td><label for="priv">Privileges</label></td>
                                    <td><input type="text" name="priv" id="priv" class="form-control" value="<?=$menu->privileges;?>"></td>
                                </tr>
                                <tr>
                                    <td>Click to update</td>
                                    <td><input type="submit" value="UPDATE" name="btnUpdateMenu" class="form-control btn btn-warning"></td>
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