<?php 
require_once '../../Controllers/ProductController.php';
require_once "../../Controllers/AuthController.php";
require_once '../../Models/product.php';
require_once "../../Controllers/CommentController.php";
require_once "../../Controllers/rateController.php";
error_reporting(E_ALL & ~E_NOTICE);

$auth = new AutherController;
$auth->sectionCheckClint(); 
$CommentController = new CommentController;
$productController = new ProductController;
$rateController = new rateController;
if(isset($_GET["id"])){
    if(!empty($_GET["id"])){
        $products = $productController->getProductDetails($_GET["id"]);
        $_SESSION["productId"] = $_GET["id"] ;
        $comments = $CommentController->getComments($_GET["id"]);
        $rateController->getProductRate($_GET["id"]);

    }else{
        header("location: index.php");
    }
}else{
    header("location: index.php");
}
if(isset($_POST["comment"])){
    if(!empty($_POST["comment"])){
        $comment = new comment;
        $comment->setContent($_POST["comment"]);
        $comment->setProductId($_GET["id"]);
        $comment->setUserId($_SESSION["userId"]);
        $CommentController->addComment($comment);
        $rateController->getProductRate($_GET["id"]);
        header("location: productDetails.php");
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="index.php">
                            <img src="../images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            
                            
                            
                            
                            
                            
                        </ul>
                    </div>
                    <div class="header__tool">
                        
                        
                        
                    <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $_SESSION["userName"] ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../images/icon/avatar-01.jpg" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $_SESSION["userName"] ?></a>
                                            </h5>
                                            <span class="email"><?php echo $_SESSION["userRole"] ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="../../Views/Auth/Login.php?logout">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">



                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">product details</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span><?php echo $_SESSION["userName"] ?></span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->



            <!-- start shaw products-->
            <div class="row"></div>
            

                    
            <!-- start shaw products-->

            

            <!-- COPYRIGHT-->
            <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">


                <div class="card">
                  <div class="card-header">
                    <strong class="card-title">Product Details </strong>
                  </div>

                  <div class="card-body">
                  <?php
                    foreach  ($products as $product) {
                    ?>
                        <div class="typo-articles">
                                    <h1 class="pb-2 display-4" ><?php echo $product['name'] ?> </h1>
                                    <img class="card-img-top" src="<?php echo $product['image'] ?>" alt="Card image cap" style="width:40%; text-align:center;">
                                    <p class="card-text"><?php echo 'Price : $ '. $product['price'] ?></p>
                                    <p class="card-text"><?php echo 'Rate : '. $product['rate'] ?> / 100 </p>
                                    <p class="card-text"><?php echo 'details : '. $product['information'] ?></p>
                                    <br>
                                    <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" style="width:60%; " >
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php
                                                foreach ($comments as $comment) {
                                                    # code...
                                                  
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $comment["firstName"] ." ".$comment["lastName"] ?></td>
                                                    <td><?php echo $comment["content"] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                    <div class="card-body card-block" style="width : 60% ;" > 
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">add comment</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="comment" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                        </form>
                    </div>
                                </div>
                                
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        
                        </div>
                                    
                    </div>          
                    <?php
                    }

                    ?>



                    <!-- add comment-->
                    
                  
                  </div>
                </div>
                



              </div>
            </div>
          </div>
        </div>
      </div>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->