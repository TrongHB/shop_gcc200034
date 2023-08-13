<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT `username` FROM `users` WHERE `username` =? and `password`=?";

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);
    $valueArray = ["$username","$password"];
    $stmt = $re->execute($valueArray);

    $numrow = $re->rowCount();
    $row = $re->fetch(PDO::FETCH_BOTH);
    if($numrow==1){
        setcookie("cc_usr",$row['username'], time() + 3600);
        header("Location: index.php");
    }else{
        echo "Something wrong!!!!!";
    }
}

?>
        <div class="container">
            <h2>Member Registeration</h2>
            <form action="" name="formlog" method="POST">
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
                <div class="row mb-3">
                    <div class="d-grid mx-auto col-3">
                    <input type="submit" value="login" class="btn btn-primary" name="btnLogin">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>