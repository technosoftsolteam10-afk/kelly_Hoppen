<?php
include_once 'config/db_conn.php';

$id = $_GET['id'] ?? null;
$model_name = $_GET['model'] ?? null;


$stmt = $conn->prepare("SELECT * FROM master_products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $conn->prepare("SELECT * FROM master_products WHERE id != ? AND img1 != ''  ORDER BY RAND() LIMIT 3");
$stmt->execute([$id]);
$similar_products = $stmt->fetchAll(PDO::FETCH_ASSOC);



function slugify($text){
    
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
    
    <title><?php 
            if(!empty($product['meta_title'])):
                echo $product['meta_title'];
            else:
                echo 'Kelly Hoppen | Luxury Designer Sanitaryware Manufacturer – India & Global';
            endif;
    ?></title>


    <meta name="keywords" content="<?php 
        if(!empty($product['meta_keyword'])):
              echo $product['meta_keyword']; 
            else :
              echo 'Kelly Hoppen';  
            endif;
            ?>
         ">

    <meta name="description" content="<?php 
        if(!empty($product['meta_description'])):
              echo $product['meta_description']; 
            else :
              echo 'Kelly Hoppen';  
            endif;
            ?>
         ">

	<?php include 'links.php'; ?>

    <style>
        .header-desktop,
        .header-mobile {
            background: var(--main-color);
        }
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
                        <?php
                        if(!empty($product)):
                        ?>
                        <section class="product-details">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <img src="<?=BASE_URL?>assets/img/products/<?= $product['img1'] ?>" alt="<?= $product['model_name'] ?>" class="product-details-image">
                                    </div>
                                    <div class="product-info col-lg-6 col-12">
                                        <h4 class="product-category"><?= $product['model_name'] ?></h4>
                                        <h2 class="product-name"><?= $product['txt1'] ?></h2>
                                        <div class="description">
                                            <p><?= $product['txt2']??'' ?></p>
                                        </div>
                                        <!-- <p class="popup-finish">Finish <span class="active-finish">Chrome</span></p>

                                        <div class="popup-colors">
                                            <span class="color-circle active" style="background:#d9d9d9;"></span>
                                            <span class="color-circle" style="background:#c5a572;"></span>
                                            <span class="color-circle" style="background:#a67c52;"></span>
                                            <span class="color-circle" style="background:#000;"></span>
                                            <span class="color-circle" style="background:#999;"></span>
                                        </div>				 -->
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                        endif;                        ?>
                        <section class="shop-details">
                            <div class="product-tabs common-padding">
                                <div class="section-padding">
                                    <div class="section-container p-l-r">
                                        <div class="product-tabs-wrap">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#highlights" role="tab">Highlights</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#specifications" role="tab">Specifications</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#installation" role="tab">Installation</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="highlights" role="tabpanel">
                                                    <h2>Design Award</h2>

                                                    <img src="https://assets.hansgrohe.com/mam/celum/celum_assets/154__Award_10_2023_tif.png?format=HBW1010" alt="">
                                                  <?php
                                                  if(!empty($similar_products)):
                                                  ?>
                                                    <div class="similar-products">
                                                        <h4 class="subtitle">Product Alternatives</h4>
                                                        <h2 class="title">Similar Products</h2>

                                                        <div class="row">
                                                              <?php
                                                 foreach($similar_products as $key => $similar_product):
                                                  ?>
                                                            <div class="col-lg-4 col-md-6 col-12">
                                                                <div class="product-box">
                                                                    <a href="#" class="product-link">
                                                                        <div class="product-img">
                                                                            <img src="<?=BASE_URL?>assets/img/products/<?= $similar_product['img1'] ?>" alt="<?= $similar_product['model_name'] ?>">
                                                                        </div>
                                                                        <div class="product-box-content">
                                                                            <h3><?= $similar_product['model_name'] ?></h3>
                                                                            <p><?= $similar_product['txt1'] ?></p>
                                                                            <p>Product code <?= $similar_product['code'] ?></p>
                                                                        </div>
                                                                    </a>
                                                                    <div class="view-detail">
														            <?php $slug = slugify($similar_product['model_name']); ?>
                                                                     <a href="<?=BASE_URL?>products/<?= $slug ?>/<?= $similar_product['id'] ?>">
															        <i class="fa fa-eye"></i> View Detail
															
														</a>
													</div>
                                                                </div>
                                                            </div>
                                                          <?php
                                                 endforeach;
                                                  ?>
                                                        </div>
                                                    </div>
                                                      <?php
                                                endif;
                                                  ?>
                                                </div>
                                                <div class="tab-pane fade" id="specifications" role="tabpanel">
                                                    <table class="product-attributes">
                                                        <tbody>
                                                            <tr class="attribute-item">
                                                                <th class="attribute-label">Color</th>
                                                                <td class="attribute-value">Black, Blue, Green</td>
                                                            </tr>
                                                            <tr class="attribute-item">
                                                                <th class="attribute-label">Color</th>
                                                                <td class="attribute-value">Black, Blue, Green</td>
                                                            </tr>
                                                            <tr class="attribute-item">
                                                                <th class="attribute-label">Color</th>
                                                                <td class="attribute-value">Black, Blue, Green</td>
                                                            </tr>
                                                            <tr class="attribute-item">
                                                                <th class="attribute-label">Color</th>
                                                                <td class="attribute-value">Black, Blue, Green</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="installation" role="tabpanel">
                                                    <div id="reviews" class="product-reviews">
                                                        <div id="comments">
                                                            <h2 class="reviews-title">1 review for <span>Bora Armchair</span></h2>
                                                            <ol class="comment-list">
                                                                <li class="review">
                                                                    <div class="content-comment-container">
                                                                        <div class="comment-container">
                                                                            <img src="media/user.jpg" class="avatar" height="60" width="60" alt="">
                                                                            <div class="comment-text">
                                                                                <div class="rating small">
                                                                                    <div class="star star-5"></div>
                                                                                </div>
                                                                                <div class="review-author">Peter Capidal</div>
                                                                                <div class="review-time">January 12, 2022</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="description">
                                                                            <p>good</p>
                                                                        </div>	
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                        <div id="review-form">
                                                            <div id="respond" class="comment-respond">
                                                                <span id="reply-title" class="comment-reply-title">Add a review</span>
                                                                <form action="#" method="post" id="comment-form" class="comment-form">
                                                                    <p class="comment-notes">
                                                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                                    </p>
                                                                    <div class="comment-form-rating">
                                                                        <label for="rating">Your rating</label>
                                                                        <p class="stars">
                                                                            <span>
                                                                                <a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a>						
                                                                            </span>					
                                                                        </p>
                                                                    </div>
                                                                    <p class="comment-form-comment">
                                                                        <textarea id="comment" name="comment" placeholder="Your Reviews *" cols="45" rows="8" aria-required="true" required=""></textarea>
                                                                    </p>
                                                                    <div class="content-info-reviews">
                                                                        <p class="comment-form-author">
                                                                            <input id="author" name="author" placeholder="Name *" type="text" value="" size="30" aria-required="true" required="">
                                                                        </p>
                                                                        <p class="comment-form-email">
                                                                            <input id="email" name="email" placeholder="Email *" type="email" value="" size="30" aria-required="true" required="">
                                                                        </p>
                                                                        <p class="form-submit">
                                                                            <input name="submit" type="submit" id="submit" class="submit" value="Submit"> 
                                                                        </p>	
                                                                    </div>
                                                                </form><!-- #respond -->
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <?php include 'scripts.php'; ?>

</body>

</html>