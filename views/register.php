<?php
    session_start();
    require "../config/connection.php";
    require "fixed/head.php";
    
?>
    <div id="sajt">
        <?php require "fixed/menu.php"; ?>
        <div class="container-fluid pt-3 pb-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5">
                        <h1>Register</h1>
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="firstName" class="text-secondary">First Name</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name"/>
                                <p class="text-danger" id="firstName-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="lastName" class="text-secondary">Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name"/>
                                <p class="text-danger" id="lastName-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-secondary">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com">
                                <p class="text-danger" id="email-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-secondary">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <p class="text-danger" id="password-error"></p>
                            </div>
                            <button type="button" id="btnRegister" name="btnRegister" class="btn btn-warning text-body">Register</button>
                        </form>
                        <div id="messageReg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "fixed/footer.php"; ?>