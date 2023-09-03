
<?php  
    $navPage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

    function highlightNav($current, $value){

        if ($current == $value) {
            $res = "current-list-item";
        } else {
            $res = "";
        }
        
        return $res;
    }
?>

<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-right">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="./">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="<?= highlightNav($navPage, "") . highlightNav($navPage, "index") ?>"><a href="./">Home</a></li>
                            <li class="<?= highlightNav($navPage, "about") ?>"><a href="about">About</a></li>
                            <li class="<?= highlightNav($navPage, "services") ?>"><a href="services">Services</a></li>
                            <li class="<?= highlightNav($navPage, "events") ?>"><a href="events">Events</a></li>
                            <li class="<?= highlightNav($navPage, "contact") ?>"><a href="contact">Contact Us</a></li>
                            <li class="<?= highlightNav($navPage, "shop") ?>"><a href="shop">Shop</a></li>
                            <li>
                                <div class="header-icons">
                                <?php 
                                    if ($navPage == "shop") {
                                        //empty
                                    } else {
                                ?>
                                    <a class="shopping-cart" href="#"><i class="fas fa-shopping-cart"></i></a>
                                <?php } ?>
                                    <a class="search-bar-icon" href="#" data-toggle="modal" data-target="#login"><i class="fas fa-user"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<div class="modal fade mt-150" id="login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="m-0">Login</h4>
                <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="" method="post"> 
                    <div class="form-group">
                        <label for="" class="mb-1 text-main-dark">Email</label>
                        <input type="email" class="form-control border-main-dark border-radius-none" name="loginEmail" id="loginEmail" placeholder="sample@gmail.com" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-1 text-main-dark">Password</label>
                        <input type="password" class="form-control border-main-dark border-radius-none" name="loginPassword" id="loginPassword" placeholder="****" required>
                    </div>
                    <div class="form-group mt-2 mb-0">
                        <button type="submit" id="loginBtn" class="btn btn-main-dark btn-block border-radius-none">Login Now</button>
                    </div>

                    <hr class="mb-2 mt-2">

                    <div class="form-group mt-2 mb-0">
                        <button type="submit" id="loginBtn" class="btn btn-warning btn-block border-radius-none">Register Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>