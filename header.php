<html>
    <head>
        <title>.....</title>
        <meta chartset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">

                <!--Logo-->
                <a href="index.php" class="navbar-brand">Logo here</a>

                <!--Button toggler-->
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <!--left-->
                    <div class="navbar-nav">
                        <a href="cart.php" class="nav-link">Cart</a>
                        <a href="allproduct.php" class="nav-link">All Product</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggler" data-bs-toggle="dropdown">Categories</a>
                            <div class="dropdown-menu">
                            <?php
                                require_once('connect.php'); 
                                $sql = "SELECT * FROM `category`";
                                $c = new Connect();
                                $dblink= $c->connectToMySQL();
                                $re = $dblink->query($sql);
                                if ($re->num_rows > 0) {
                                    while ($row = $re->fetch_assoc()) {
                                ?>
                                <a href="category.php?id=<?=$row['catid']?>" 
                                    class="dropdown-item"><?=$row['catname']?></a>
                                <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    
                    <!--right-->
                    <?php
                        if (isset($_COOKIE['cc_usr'])) {                   
                    ?>
                    <div class="navbar-nav ms-auto">
                        <a href="#" class="nav-link">Welcome,
                            <?=$_COOKIE['cc_usr']?>
                        </a>
                        <a href="logout.php" class="nav-link">Logout</a>
                    </div>
                    <?php
                        } else{
                    ?>
                    <div class="navbar-nav ms-auto">
                        <a href="register.php" class="nav-link">Register</a>
                        <a href="login.php" class="nav-link">Login</a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </nav>