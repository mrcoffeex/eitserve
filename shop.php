<?php  
	require 'config/includes.php';

	$title = "Shop";
	$ratings = @clean_int($_GET['ratings']);
	$priceMin = @clean_float($_GET['priceMin']);
	$priceMax = @clean_float($_GET['priceMax']);

	include 'shop.paginate.php';

	if ($pagenum <= 1) {
		$pages = "1 - " . $page_rows;
	} else {

		if ((($page_rows * ($pagenum - 1)) + $page_rows) > $countRes) {
			$endPage = $countRes;
		} else {
			$endPage = (($page_rows * ($pagenum - 1)) + $page_rows);
		}
		
		$pages = ($page_rows * ($pagenum - 1)) + 1 . " - " . $endPage; 
	}

	$resultsText = $pages . " of " . $countRes . " results";
?>

<!DOCTYPE html>
<html lang="en">

	<?php include '_head.php'; ?>

<body>
	
	<?php include '_header.php' ?>

	<div class="product-section-search bg-main-dark">
		<div class="container">
			<div class="row mt-2">
				<div class="col-lg-10 mb-3">
					<form action="" method="post">
						<div class="input-group">
							<input type="text" class="form-control border-warning border-radius-none" placeholder="Search in this area..." aria-label="Search" aria-describedby="search-button">
							<div class="input-group-append">
								<button type="submit" class="btn btn-outline-warning pl-5 pr-5 border-radius-none" id="search-button"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2">
					<a href="#">
						<button type="button" class="btn btn-outline-warning btn-block border-radius-none"><i class="fas fa-shopping-cart"></i> &nbsp;Cart</button>
					</a>
				</div>
				<div class="col-lg-12">
					<p class="search-history-text">
						<a href="search?keywords=laptop" class="text-white mr-3 bordered-btn pt-1 pb-1">Laptop</a>
						<a href="search?keywords=gaming laptop" class="text-white mr-3 bordered-btn pt-1 pb-1">Gaming Computer</a>
						<a href="search?keywords=acer" class="text-white mr-3 bordered-btn pt-1 pb-1">Acer</a>
						<a href="search?keywords=lenovo" class="text-white mr-3 bordered-btn pt-1 pb-1">Lenovo</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="product-section mt-4 mb-4">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<h4><i class="fas fa-filter"></i> Filter</h4>
					<div class="mt-3">
						<p class="font-weight-bold mb-2">Ratings</p>
						<a href="shop?ratings=5" class="text-main-dark bordered-btn pt-0 pb-0 mb-2">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</a>
						<a href="shop?ratings=4" class="text-main-dark bordered-btn pt-0 pb-0 mb-2">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="far fa-star"></i>
						</a>
						<a href="shop?ratings=3" class="text-main-dark bordered-btn pt-0 pb-0 mb-2">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</a>
						<a href="shop?ratings=2" class="text-main-dark bordered-btn pt-0 pb-0 mb-2">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</a>
						<a href="shop?ratings=1" class="text-main-dark bordered-btn pt-0 pb-0 mb-2">
							<i class="fas fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
							<i class="far fa-star"></i>
						</a>
					</div>
					<div class="mt-3">
						<p class="font-weight-bold mb-2">Price Range</p>
						<div class="row">
							<div class="col-md-6 p-1">
								<input type="text" class="form-control border-radius-none" name="priceRangeFrom" id="priceRangeFrom" placeholder="Min">
							</div>
							<div class="col-md-6 p-1">
								<input type="text" class="form-control border-radius-none" name="priceRangeTo" id="priceRangeTo" placeholder="Max">
							</div>
							<!-- <div class="col-md-12 p-1">
								<button type="submit" class="btn btn-main-dark btn-block border-radius-none">Submit</button>
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-12 mb-3">
							<i class="fas fa-info-circle"></i> <?= $resultsText ?>
						</div>
						<?php  
							while ($item=$paginate->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col-lg-3 col-md-6 mb-3">
							<div class="single-product-item d-flex flex-column h-100 mb-2">
								<div class="product-images-shop">
									<a href="#"><img src="assets/img/eit/400x500.jpg" alt=""></a> 
								</div>
								<div class="product-description">
									<p class="mb-0 mt-1 item-title-text"><?= $item['product_name'] ?></p>
									<p class="mb-0 item-title-text text-muted"><?= $item['product_brand'] ?></p>
									<p class="mb-1">&#8369; <span class="text-main-yellow"><?= RealNumber($item['product_price_srp'], 2) ?></span></p>
									<p class="mb-2"><i class="fas fa-star text-main-yellow"></i> <span class="item-title-text"><?= $item['product_stars'] ?>, <?= $item['product_reviews'] ?> reviews</span></p>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-xs-12">
											<button type="button" class="btn btn-warning btn-block border-radius-none">Add To Cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<?= $paginationCtrls; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<section class="list-section pt-80">
    	<div class="container">
        	<h2 class="text-center">Our Products</h2>
        </div>
    </section>

	<?php include '_brands.php'; ?>

	<?php include '_footer.php'; ?>
	<?php include '_scripts.php'; ?>

</body>
</html>