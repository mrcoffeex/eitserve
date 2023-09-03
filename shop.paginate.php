<?php  
    //pagination

    if (!empty($ratings)) {

        if ($ratings == 5) {
            $ratingsRequest = "AND product_stars = '$ratings' ";
        } else if ($ratings == 4) {
            $ratingsRequest = "AND (product_stars BETWEEN '$ratings' AND '4.9' ) ";
        } else if ($ratings == 3) {
            $ratingsRequest = "AND (product_stars BETWEEN '$ratings' AND '3.9' ) ";
        } else if ($ratings == 2) {
            $ratingsRequest = "AND (product_stars BETWEEN '$ratings' AND '2.9' ) ";
        } else if ($ratings == 1) {
            $ratingsRequest = "AND (product_stars BETWEEN '$ratings' AND '1.9' ) ";
        } else {
            $ratingsRequest = "";
        }
    } else {
        $ratingsRequest = "";
    }

    if (!empty($priceMin) || !empty($priceMax)) {
        $priceRequest = " AND (product_price_srp BETWEEN '$priceMin' AND '$priceMax') ";
    } else {
        $priceRequest = "";
    }

    $countResults=dataConnect()->prepare("SELECT 
                                        *
                                        FROM
                                        products
                                        Where
                                        date(product_created)
                                        BETWEEN
                                        DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()
                                        " . $ratingsRequest . $priceRequest . "
                                        Order By
                                        product_created
                                        DESC");
    $countResults->execute();

    $getPaginate=dataConnect()->prepare("SELECT 
                                    COUNT(product_id)
                                    FROM
                                    products
                                    Where
                                    date(product_created)
                                    BETWEEN
                                    DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()
                                    " . $ratingsRequest . $priceRequest . "
                                    Order By
                                    product_created
                                    DESC");
    $getPaginate->execute();

    $countRes=$countResults->rowCount();
    
    $paginates=$getPaginate->fetch(PDO::FETCH_BOTH);

    $page_rows = 12; // limit every page

    $last = ceil($paginates[0]/$page_rows);
    
    if($last < 1){
        $last = 1;
    }
    
    $pagenum = 1;
    
    if(isset($_GET['pn'])){
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
    }
    
    if ($pagenum < 1) { 
        $pagenum = 1; 
    } else if ($pagenum > $last) { 
        $pagenum = $last; 
    }
    
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

    
    $paginate=dataConnect()->prepare("SELECT 
                                    *
                                    FROM
                                    products
                                    Where
                                    date(product_created)
                                    BETWEEN
                                    DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()
                                    " . $ratingsRequest . $priceRequest . "
                                    Order By
                                    product_created
                                    DESC
                                    $limit");
    $paginate->execute();
    
    
    $paginationCtrls = '';

    if($last != 1){
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].
            '?pn='.$previous.
            '" >Prev</a></li>';
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].
                    '?pn='.$i.
                    '" >'.$i.'</a></li>';
                }
            }
        }

        $paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li>';
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].
            '?pn='.$i.
            '" >'.$i.'</a></li>';
            if($i >= $pagenum+4){
                break;
            }
        }

        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].
            '?pn='.$next.
            '" >Next</a></li>';
        }
    }
?>