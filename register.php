<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnRegister'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hometown = $_POST['hometown'];

    $sql = "INSERT INTO `users`(`username`, `password`, `hometown`) VALUES (?,?,?)";

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);

    $valueArray = ["$username","$password","$hometown"];
    $stmt = $re->execute($valueArray);
    if($stmt) echo "Congrats";
}

?>
        <div class="container">
            <h2>Member Registeration</h2>
            <form action="" name="formReg" method="POST">
                <div class="row mb-3">
                    <label for="username" class="col-lg-1">Username:</label>
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="username">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-lg-1">Password:</label>
                    <div class="col-lg-11">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="hometown" class="col-lg-1">Homtown:</label>
                    <div class="col-lg-11">
                        <select name="hometown" id="" class="form-select">
                            <option selected value="unknown">Choose your hometown</option>
                            <option value="ct">Can Tho</option>
                            <option value="hcm">Ho Chi Minh</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="d-grid mx-auto col-3">
                    <input type="submit" value="Register" class="btn btn-primary" name="btnRegister">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>