<?php
    session_start();
    ob_start();
    
    if(!isset($_SESSION['korisnik'])){
        header("Location: index.php");
    }else{
        $korisnik = $_SESSION['korisnik'];
        if($korisnik->RoleName != "admin"){
            header("Location: index.php");
        }
    }

    require "../config/connection.php";
    require "fixed/head.php";
?>
    <div id="sajt">
        <?php
            require "fixed/menu.php";
            $selectFilmovi = $conn->query("SELECT * FROM movie")->fetchAll();
        ?>
        <h2 class="text-center">Admin Panel</h2>
        <div class="container-fluid pt-3">
            <h3 class="text-center">USER</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Manage users</h4>
                        <table class="table table-striped table-dark text-center">
                            <thead>
                                <tr>
                                   <!-- <th>No</th> -->
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectKorisnika = $conn->query("SELECT u.idUser, u.first_name, u.last_name, u.email, wr.name as role FROM user u INNER JOIN website_role wr ON u.idWebsiteRole = wr.idWebsiteRole")->fetchAll();
                                    foreach($selectKorisnika as $user):
                                ?>
                                <tr>
                                    <td><?= $user->first_name;?> <?= $user->last_name;?></td>
                                    <td><?= $user->email;?></td>
                                    <td><?= $user->role;?></td>
                                    <td><a href="../models/user/deleteUser.php?id=<?=$user->idUser;?>">DELETE</a></td>
                                    <td><a href="../models/updateUserForm.php?id=<?=$user->idUser;?>">UPDATE</a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h4>Add new user</h4>
                        <form action="#" method="POST">
                            <table class="table table-striped table-dark text-center">
                                <thead>
                                    <th>Category</th>
                                    <th>Values</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="firstName">First Name</label></td>
                                        <td><input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="lastName">Last Name</label></td>
                                        <td><input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="password">Password</label></td>
                                        <td><input type="password" class="form-control" name="password" id="password" placeholder="Password"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="role">Role</label></td>
                                        <td><input type="text" name="role" id="role" placeholder="Website role: admin(1), user(2)" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Click to add</td>
                                        <td><button type="button" id="btnAddUser" name="btnAddUser" class="btn btn-warning text-body">Add new user</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>                               
        <div class="container-fluid pt-3">
            <h3 class="text-center">MOVIE</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Update/Delete Movies</h4>
                        <table class="table table-striped table-dark text-center">
                            <thead>
                                <th>No</th>
                                <th>Movie name</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </thead>
                            <tbody>
                                <?php  $i = 1;
                                foreach($selectFilmovi as $film): ?>
                                <tr>     
                                    <td><?= $i++; ?></td>
                                    <td><?=$film->title;?></td>
                                    <td><a href="../models/movie/deleteMovie.php?id=<?=$film->idMovie;?>">DELETE</a></td>
                                    <td><a href="../models/updateForm.php?id=<?=$film->idMovie;?>">UPDATE</a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h3>Insert Movies</h3>
                        <form action="#" method="post">
                            <table class="table table-striped table-dark text-center">
                                <thead>
                                    <th>Category</th>
                                    <th>Values</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="title">Movie Name</label></td>
                                        <td><input type="text" name="title" id="title" placeholder="Movie Name" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="date">Release Date</label></td>
                                        <td><input type="text" name="date" id="date" placeholder="YYYY-MM-DD" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="runtime">Runtime</label></td>
                                        <td><input type="text" name="runtime" id="runtime" placeholder="In minutes" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="synopsis">Synopsis</label></td>
                                        <td><input type="text" name="synopsis" id="synopsis" placeholder="Synopsis" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="ddlStudio">Studio</label></td>
                                        <td><select name="ddlStudio" id="ddlStudio" class="form-control">
                                            <?php
                                                $selectSvihStudija = $conn->query("SELECT * FROM studio")->fetchAll();
                                                foreach($selectSvihStudija as $studio):
                                            ?>
                                                <option value="<?=$studio->idStudio;?>">
                                                    <?=$studio->name;?>
                                                </option>
                                            <?php endforeach;?>
                                        </select></td>
                                    </tr>
                                    <tr>
                                        <td><label for="btnInsert">Click to add:</label></td>
                                        <td><input type="button" name="btnInsert" id="btnInsert" value="INSERT" class="form-control btn-warning"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div id="message" class="text-danger pb-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-3"> 
            <h3 class="text-center">MENU</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Delete/Update Menu Elements</h4>
                        <table class="table table-striped table-dark text-center">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>Href</th>
                                <th>Privileges</th>
                                <th>DELETE</th>
                                <th>UPDATE</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    $menu = $conn->query("SELECT * FROM menu")->fetchAll();
                                    foreach($menu as $m):
                                ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$m->name?></td>
                                    <td><?=$m->href?></td>
                                    <td><?=$m->privileges?></td>
                                    <td><a href="../models/menu/deleteMenuElement.php?id=<?=$m->idMenu?>">DELETE</a></td>
                                    <td><a href="../models/updateMenuForm.php?id=<?=$m->idMenu?>">UPDATE</a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h4>Add new menu elements</h4>
                        <form action="../models/menu/addMenu.php" method="post">
                            <table class="table table-striped table-dark text-center">
                                <thead>
                                    <th>Category</th>
                                    <th>Values</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="menuName">Name</label></td>
                                        <td><input type="text" id="menuName" name="menuName" placeholder="Menu element name" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="href">Href</label></td>
                                        <td><input type="text" id="href" name="href" placeholder="Href" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="priv">Privileges</label></td>
                                        <td><input type="text" name="priv" id="priv" placeholder="Privileges" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Click to add</td>
                                        <td><input type="submit" id="btnAddMenu" name="btnAddMenu" value="Add" class="form-control btn btn-warning"></td>
                                    </tr>
                                </tbody>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h3 class="text-center">GENRE</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Genre's from database</h4>
                        <table class="table table-striped table-dark text-center">
                            <thead>
                                <th>No</th>
                                <th>Genre Name</th>
                            </thead>
                            <tbody>
                                <?php
                                   $selectZanr = $conn->query("SELECT * FROM genre")->fetchAll();
                                    $i = 1;
                                    foreach($selectZanr as $z):
                                ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$z->name;?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h4>Add new genre</h4>
                        <form action="../models/genre/addGenre.php" method="post">
                            <table class="table table-striped table-dark text-center">
                                <thead>
                                    <th>Category</th>
                                    <th>Values</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="genre">Genre</label></td>
                                        <td><input type="text" id="genre" name="genre" placeholder="Genre" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td>Click to add</td>
                                        <td><input type="submit" name="btnGenre" id="btnGenre" value="Add" class="form-control btn btn-warning"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>


    </div>
    
    <?php require "fixed/footer.php"; ?>