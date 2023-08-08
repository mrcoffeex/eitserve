
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
            <div class="col-lg-12 col-sm-12 text-center">
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
                            <li class="<?= highlightNav($navPage, "services") ?>"><a href="#">Services</a></li>
                            <li class="<?= highlightNav($navPage, "events") ?>"><a href="#">Events</a></li>
                            <li class="<?= highlightNav($navPage, "contact") ?>"><a href="contact">Contact Us</a></li>
                            <li class="<?= highlightNav($navPage, "shop") ?>"><a href="#">Shop</a></li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="cart"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
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

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="...">
                        <button type="submit">Search in Shop <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->