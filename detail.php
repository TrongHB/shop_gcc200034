<?php
require_once('header.php');
require_once('connect.php');
$a = $_GET['id'];

    $sql = "SELECT * FROM`product` WHERE pid='$a'" ;

    $c = new Connect();
    $dblink = $c->connectToMySQL();
    $re = $dblink->query($sql);

    if($re->num_rows>0){
        ?>
        <div class="container">
            <div class="row justify-content-center">
        <?php
        while($row=$re->fetch_assoc()){
            ?>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <a target="_blank" href="#">
          <img src="./Image/<?=$row['pimage']?>" class="card-img-top" alt="product.title" />
            </a>

        <div class="label-top shadow-sm">
            <a class="text-white" target="_blank" ></a>
        </div>
        <div class="card-body">
            <div class="clearfix mb-3">
                <span class="float-start badge rounded-pill bg-success"><?=$row['pprice']?></span>
        </div>
            <h5 class="card-title">
                <a target="_blank" href="detail.php?id=<?=$row['pid']?>"><?=$row['pname']?></a>
            </h5>
            <div>
            <?=$row['pinfo']?>
            </div>
            <div class="d-grid gap-2 my-4">

                <a href="cart.php?id=<?=$row['pid']?>" class="btn btn-warning bold-btn">Add to cart</a>

            </div>
          <div class="clearfix mb-1">

            <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>

            <span class="float-end">
              <i class="far fa-heart" style="cursor: pointer"></i>

            </span>
            </div>
        </div>
      </div>
    </div>
<?php
    }
    ?>
            </div>
        </div>
    <?php

}

else{
        echo "Not found";
}
?>
