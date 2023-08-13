<?php
include_once("header.php");
include_once("connect.php");
$c = new Connect();
$dblink = $c->connectToPDO();
if(isset($_COOKIE['cc_usr'])){
if(isset($_GET['id'])){
    $pid = $_GET['id'];
    $findSql = "SELECT `cproid` FROM `cart` WHERE `cproid` = ? and `cuserid` = ?";//hỏi cumtomer có mua chưa
    $re = $dblink->prepare($findSql);
    $valueArray = [$pid,1];
    $stmt = $re->execute($valueArray);
echo $re->rowCount();
    if($re->rowCount() ==0){
    $sql = "INSERT INTO `cart`(`cuserid`, `cproid`, `cquantity`, `cdate`) VALUES (?,?,1,CURDATE())";
    }else{
        $sql = "UPDATE `cart` SET `cquantity`=`cquantity` +1,`cdate`= CURDATE() WHERE `cuserid` =? and `cproid` = ? ";
    }

    $re1 = $dblink->prepare($sql);
    $valueArray1 = [1,$pid];
    $stmt = $re1->execute($valueArray1);
}
    $showCartSQL = "SELECT `pimage` ,`pname`,`cquantity`,`pprice` FROM `cart` c, `product` p WHERE c.cproid = p.pid and `cuserid` = ?";
    $re1 = $dblink->prepare($showCartSQL);
    $valueArray1 = [1];
    $stmt = $re1->execute($valueArray1);
    $rows = $re1->fetchAll(PDO::FETCH_BOTH);//chi row
}else{
    header("Location: login.php");
}
?>
<!--Template for shopping cart-->
<style type="text/css">
    .bgd-danger {
        background: linear-gradient(30deg, red, yellow);
    }

    .btn-n {
        color: white;
        background: gray;
        transition: .2s ease;
        transform: skew(0deg);
    }

    .btn-n:hover {
        background: red;
        color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, .8);
        transition: .2s ease;
        transform: scale(1.08) translateY(-3px);
    }

    .btn-y {
        background: gray;
        color: white;
        transition: .2s ease;
    }

    .btn-y:hover {
        background: green;
        color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, .8);
        transition: .2s ease;
        transform: scale(1.08) translateY(-3px);
    }

    .card-bg {
        transition: 1s ease;
    }

    .card-bg:hover {
        transform: skew(-10deg) scale(1.05);
        transition: 1s ease;
    }

    .icons {
        transition: .8s ease;
        cursor: pointer;
    }

    .icons:hover {
        color: #007BFF;
        transform: scale(1.05) translateY(-5px);
        transition: .8s ease;
    }

    .iconck {
        color: #007BFF;
        transform: scale(1.05) translateY(-5px);
    }

    .icon {
        transition: 1s ease;
    }

    .icon:hover {
        transform: scale(1.2);
        transition: 1s ease;
    }

    .text-trans {
        transition: .5s ease;
    }

    .text-trans:hover {
        transform: skew(-15deg);
        transition: .5s ease;
    }

    .btns {
        background: #007BFF;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 1s ease;
    }

    .btns:hover {
        text-decoration: none;
        color: white;
        box-shadow: 5px 5px 7px rgba(0, 0, 0, .8);
        transform: scale(1.05) translateY(-8px) skew(-10deg);
        transition: 1s ease;
    }

    .bg-alert {
        box-shadow: 0 0 3px rgba(0, 0, 0, .8);
    }

    .bg-alert-bg {
        box-shadow: 0 0 10px rgba(0, 0, 0, .8);
        transform: scale(1.05);
    }

    .w-35 {
        width: 36% !important;
    }

    .mrg-ct {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .int-chagne {
        transition: 1s ease;
    }

    .int-chagne:hover {
        transform: skew(-15deg);
        transition: 1s ease;
    }

    .turn {
        display: block;
        transform: none;
        transition: .5s ease;
    }

    .turnb {
        display: block;
        transform: rotate(-180deg);
        transition: .5s ease;
    }

    .clps {
        color: #007BFF;
        text-decoration: none !important;
    }

    .clps:hover {
        color: #007BFF;
    }

    .clps-btn-style {
        transition: .5s ease;
    }

    .clps-btn-style:hover {
        color: #007BFF;
        transform: skew(-15deg);
        transition: .5s ease;
    }

    p {
        margin-bottom: .5px !important;
    }
    </style>
</style>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card border-0">
                            <div class="card-header d-flex justify-content-between" id="headingOne">
                                <h2 class="mb-0">
                                    <button id="turnbf" class="btn btn-link d-flex turnaf clps" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h2 class="">Show the cart detail</h2>
                                        <span class="mx-1"><i class="far fa-chevron-double-down"></i></span>
                                    </button>
                                </h2>
                                <span class="my-2 text-danger h4"></span>
                            </div>
                            <?php
                                foreach($rows as $row){
                            ?>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body p-0">
                                    <div>
                                        <table class="table table-sm">
                                            <thead>
                                                <tr class="ml-3">
                                                    <th></th>
                                                    <th></th>
                                                    <th class="text-left" width="50%">Product</th>
                                                    <th class="text-center" width="45%">Pieces</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <a href="img/delete.png" data-toggle="modal" data-title="Delete your product ?">
                                                            <i class="fal fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <img class="rounded" src = "./Image/<?=$row['pimage']?>" width="50px"/>
                                                    </td>
                                                    <td class="align-middle text-left"><?=$row['pname']?></td>
                                                    <td class="align-middle text-center"><?=$row['cquantity']?></td>
                                                    <td class="align-middle text-right"><?=$row['pprice']* $row['cquantity']?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                                ?>
                            <div class="d-flex justify-content-center">
                                <a href = "index.php"class="btn btn-primary" type="submit">Continue to shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>