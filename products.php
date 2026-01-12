<?php
include_once 'config/db_conn.php';

$cateId = $_GET['cate'] ?? '';

$sql = "
    SELECT p.*, c.cate_name
    FROM master_products p
    LEFT JOIN master_category c ON p.cate_id = c.cate_id
    WHERE p.img1 IS NOT NULL AND p.img1 != ''
";

if (!empty($cateId)) {
	$sql .= " AND p.cate_id = :cate_id";
}

$stmt = $conn->prepare($sql);

if (!empty($cateId)) {
	$stmt->bindParam(':cate_id', $cateId, PDO::PARAM_INT);
}

$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);




function slugify($text)
{

	$text = preg_replace('~[^\pL\d]+~u', '-', $text);


	$text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);


	$text = preg_replace('~[^-\w]+~', '', $text);


	$text = trim($text, '-');


	$text = preg_replace('~-+~', '-', $text);


	$text = strtolower($text);

	return $text;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kelly Hoppen | Luxury Designer Sanitaryware Manufacturer – India & Global</title>

	<meta name="keywords" content="Kelly Hoppen">
	<meta name="description" content="Kelly Hoppen">

	<?php include 'links.php'; ?>

	<style>
		@media only screen and (min-width: 1200px) {
			#main-navigation .menu-item-text {
				color: #000;
				font-size: 18px;
				transition: all 0.3s ease;
			}

			#main-navigation a {
				color: #000;
				transition: all 0.3s ease;
			}

			#main-navigation .menu-item-text::before {
				background: #000;
				transition: all 0.3s ease;
				display: none;
			}

			#main-navigation .menu-item-text::after {
				color: #000;
				transition: all 0.3s ease;
			}
		}

		.site-header .header-right .search-toggle i {
			color: #000;
		}
	</style>

</head>

<body class="home home-3 title-3">
	<div id="page" class="hfeed page-wrapper">

		<?php include 'header.php'; ?>

		<div id="site-main" class="site-main">
			<div id="main-content" class="main-content">
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<section class="breadcrumb">
							<div class="container">
								<div class="breadcrumb-content">
									<h1>Wash basins</h1>

									<?php if (!empty($products) && !empty($products[0]['cate_name'])): ?>
										– <?= htmlspecialchars($products[0]['cate_name']); ?>
									<?php endif; ?>


									<!-- <div class="product-category-filter">
										<a href="#" class="item active">All Products</a>
										<a href="#" class="item">Showers</a>
										<a href="#" class="item">Bath Mixers</a>
										<a href="#" class="item">Thermostatic Mixer</a>
										<a href="#" class="item">Bath Accessories</a>
										<a href="#" class="item">Wash Basin & Bath Tubs</a>
										<a href="#" class="item">Installation Technology</a>
										<a href="#" class="item">Waste System</a>
										<a href="#" class="item">Collection</a>
									</div> -->
								</div>
							</div>
						</section>

						<section class="product-grid common-padding pt-0">
							<div class="container">
								<div class="row">
									<?php if (!empty($products)): ?>
										<?php foreach ($products as $product): ?>
											<div class="col-lg-4 col-md-6 col-12">
												<div class="product-box">
													<div class="product-img">
														<?php if(!empty($product['img1'])):
															echo "<img src=".BASE_URL."assets/img/products/". $product['img1'].
																	"alt=" .htmlspecialchars($product['model_name']).">";
															else:
															echo "<img src=". BASE_URL ."assets/img/products/comingsoon.jpg";
														endif;?> 
													</div>

													<div class="product-box-content">
														<h3><?= htmlspecialchars($product['model_name']); ?></h3>
														<p><?= htmlspecialchars($product['txt1']); ?></p>
														<p>Product code <?= htmlspecialchars($product['code']); ?></p>
													</div>

													<div class="view-detail">
														<a href="<?= BASE_URL ?>product/<?= slugify($product['model_name']); ?>/<?= $product['id']; ?>">
															<i class="fa fa-eye"></i> View Detail
														</a>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									<?php else: ?>
										<div class="col-12 text-center">
											<p>No products found.</p>
										</div>
									<?php endif; ?>
								</div>



							</div>
					</div>
					</section>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>

	</div>

	<div id="productPopup" class="product-popup-container">
		<div class="product-popup">
			<div class="popup-container">
				<div class="row align-items-center">
					<div class="col-md-6 col-12">
						<div class="popup-left">
							<h4 class="popup-subtitle" id="productpopup-subtitle">AXOR ONE</h4>
							<h2 class="popup-title" id="productpopup-title">Hand shower 75 1jet EcoSmart</h2>
							<img src="assets/Products/DERBAN.jpg" id="productpopup-img" alt="Hand Shower" class="popup-image">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<!-- Right Side -->
						<div class="popup-right">
							<p class="popup-finish">Finish <span class="active-finish">Chrome</span></p>

							<!-- Color options -->
							<div class="popup-colors">
								<span class="color-circle active" style="background:#d9d9d9;"></span>
								<span class="color-circle" style="background:#c5a572;"></span>
								<span class="color-circle" style="background:#a67c52;"></span>
								<span class="color-circle" style="background:#000;"></span>
								<span class="color-circle" style="background:#999;"></span>
							</div>

							<p class="popup-art">Art. no. <strong>48651000</strong></p>

							<!-- Buttons -->
							<button class="popup-btn">Find a specialist dealer</button>
							<div class="popup-links">
								<a href="#">♡ Add to Notepad</a>
								<a href="#">⇆ Compare Products</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="popup-close" id="popupClose"><i class="fa-solid fa-xmark"></i></div>
		</div>
	</div>

	<?php include 'scripts.php'; ?>

</body>

</html>