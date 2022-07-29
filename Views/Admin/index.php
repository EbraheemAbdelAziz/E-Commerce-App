<?php
require_once("../../Controllers/AuthController.php");
require_once("../../Controllers/CategoryController.php");
require_once("../../Controllers/KeywordController.php");



$auth = new AutherController;
$auth->sectionCheckAdmin();
require_once '../../Controllers/ProductController.php';
require_once '../../Models/product.php';
$productController = new ProductController;
$products = $productController->getAllProducts();
$deleteMsg1 = false; //for product
$deleteMsg2 = false; //for Categories
$deleteMsg3 = false; //for Keywords
         /* delete product */
if (isset($_POST["deleteProduct"])) {
  if (!empty($_POST["productId"])) {
    if ($productController->deleteProduct($_POST["productId"])) {
      $deleteMsg1 = true;
      $products = $productController->getAllProducts();
    }
  }
}
        /* delete Category */
$CategoryController = new CategoryController;
$categories = $CategoryController->getCategories();
if (isset($_POST["deleteCategory"])) {
    if (!empty($_POST["categorytId"])) {
      if ($CategoryController->deleteCategory($_POST["categorytId"])) {
        $deleteMsg2 = true;
        $categories = $CategoryController->getCategories();
      }
    }
  }
        /* delete Keyword */
$KeywordController = new KeywordController;
$keywords = $KeywordController->getKeyword();
if (isset($_POST["deleteKeyword"])) {
    if (!empty($_POST["KeywordtId"])) {
      if ($KeywordController->deleteKeyword($_POST["KeywordtId"])) {
        $deleteMsg3 = true;
        $keywords = $KeywordController->getKeyword();
      }
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
        </header>        <!-- END HEADER DESKTOP-->



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
                                        <li class="list-inline-item">Dashboard</li>
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

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Products</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    
                                </div>
                                <div class="table-data__tool-right"><a href="addProduct.php">
                                <button hraf= "addProduct.php" type="button" class="btn btn-primary">Add Product</button>
                                </a>   
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            
                                            <th>project name</th>
                                            <th>price</th>
                                            <th>rate</th>
                                            <th>category</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        foreach ($products as $product) {
                                        ?>
                                            <tr> 
                                                <td><?php echo $product["name"] ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $product["price"] ?> $</span>
                                                </td>
                                                <td class="desc"><?php echo $product["rate"] ?></td>
                                                <td><?php echo $product["category"] ?></td>
                                                <td><!--  -->
                                                <form action="index.php" method="POST">
                                                <input type="hidden" name="productId" value="<?php echo $product["id"] ?>">
                                                <button type="submit" name="deleteProduct"class="btn btn-danger">delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                                
                        </div>
                        
                    </div>
                </div>
                
            </section>
            <!-- END DATA TABLE-->
            <?php
            if ($deleteMsg1 == true) {
            ?>
            
              <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
											<span class="badge badge-pill badge-primary">Success</span>
											Deleted successfully
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

            <?php

            }

            ?>
<br>
<br>


            <!-- Start Category table-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">categories</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    
                                </div>
                                <div class="table-data__tool-right"><a href="addCategory.php">
                                <button hraf= "addCategory.php" type="button" class="btn btn-primary">Add Category</button>
                                </a>   
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            
                                            <th>Category name</th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        foreach ($categories as $category) {
                                        ?>
                                            <tr> 
                                                <td><?php echo $category["name"] ?></td>
                                                
                                                <td><!-- delete botton -->
                                                <form action="index.php" method="POST">
                                                <input type="hidden" name="categorytId" value="<?php echo $category["id"] ?>">
                                                <button type="submit" name="deleteCategory"class="btn btn-danger">delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                                
                        </div>
                        
                    </div>
                </div>
                
            </section>
            <?php
            if ($deleteMsg2 == true) {
            ?>
            
              <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
											<span class="badge badge-pill badge-primary">Success</span>
											Deleted successfully
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

            <?php

            }

            ?>
            
            <!-- End Category table-->



            <!-- Start Keywords table-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Keywords</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    
                                </div>
                                <div class="table-data__tool-right"><a href="addKeyword.php">
                                <button hraf= "addCategory.php" type="button" class="btn btn-primary">Add Keyword</button>
                                </a>   
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            
                                            <th>Keyword</th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                        foreach ($keywords as $keyword) {
                                        ?>
                                            <tr> 
                                                <td><?php echo $keyword["word"] ?></td>
                                                
                                                <td><!-- delete botton -->
                                                <form action="index.php" method="POST">
                                                <input type="hidden" name="KeywordtId" value="<?php echo $keyword["id"] ?>">
                                                <button type="submit" name="deleteKeyword"class="btn btn-danger">delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                                
                        </div>
                        
                    </div>
                </div>
                
            </section>
            <?php
            if ($deleteMsg3 == true) {
            ?>
            
              <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
											<span class="badge badge-pill badge-primary">Success</span>
											Deleted successfully
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

            <?php

            }

            ?>
            
            <!-- End Keywords table-->


            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
