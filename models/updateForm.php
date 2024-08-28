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
        $priprema = $conn->prepare("SELECT * FROM movie WHERE idMovie = :id");
        $priprema->bindParam(":id",$id);
        $priprema->execute();
        $film = $priprema->fetch();
    }
    
?>
<div id="sajt">
    <?php require "../views/fixed/menu.php";?>
    <div class="container-fluid">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                <form action="movie/updateMovie.php" method="post">
                    <input type="hidden" name="hiddenId" value="<?=$_GET['id'];?>"/>
                    <table class="table table-striped table-dark text-center">
                        <thead>
                            <th>Category</th>
                            <th>Values</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label for="name">Movie Name</label></td>
                                <td><input type="text" name="name" class="form-control" value="<?=$film->title;?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="date">Release Date</label></td>
                                <td><input type="text" name="date" class="form-control" value="<?=$film->release_date;?>"/></td>
                            </tr>

                            <tr>
                                <td><label for="time">Runtime</label></td>
                                <td><input type="text" name="time" class="form-control" value="<?=$film->runtime;?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="synopsis">Synopsis</label></td>
                                <td><textarea name="synopsis" class="form-control" cols="30" rows="10"><?=$film->synopsis?></textarea></td>
                            </tr>
                            <tr>
                                <td><label for="ddlStudio">Studio</label></td>
                                <td>
                                    <select name="ddlStudio" class="form-control">
                                        <?php
                                            $selectSvihStudija = $conn->query("SELECT * FROM studio")->fetchAll();
                                            foreach($selectSvihStudija as $studio){
                                                if($studio->idStudio == $film->idStudio){
                                                    echo "<option value='{$studio->idStudio}' selected='{$studio->name}'>{$studio->name}</option>";
                                                }else{
                                                    echo "<option value='{$studio->idStudio}'>{$studio->name}</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="genre">Genre</label></td>
                                <td>
                                    <select name="genre" id="genre" class="form-control">
                                        <?php
                                            $selectZanrova = $conn->query("SELECT * FROM genre")->fetchAll();
                                            foreach($selectZanrova as $zanr){
                                                echo "<option value='{$zanr->idGenre}'>{$zanr->name}</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Click to update:</td>
                                <td><input type="submit" class="form-control btn-warning" name="btnUpdate" value="UPDATE"/></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  require "../views/fixed/footer.php"; ?>

