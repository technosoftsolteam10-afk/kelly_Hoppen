<?php
include_once 'config/db_conn.php';


$master_cat_slug=$_GET['category'] ?? null;

$seo_title = "Kelly Hoppen | Luxury Designer Sanitaryware Manufacturer – India & Global";
$seo_description = "Kelly Hoppen luxury sanitaryware collection for modern bathrooms across India and global markets.";
$seo_keywords = "Kelly Hoppen, luxury sanitaryware, designer bathroom products";
$matched_master_cat = [];
if(!empty($master_cat_slug)){
    $master_cat_sql="SELECT * FROM master_prd_cat WHERE mpc_slug = :mpc_slug LIMIT 1"; 
    $masCatStmt = $conn->prepare($master_cat_sql); 
    $masCatStmt->bindValue(':mpc_slug',$master_cat_slug, PDO::PARAM_STR); 
    $masCatStmt->execute(); 
    $matched_master_cat = $masCatStmt->fetch(PDO::FETCH_ASSOC);
}
if (!empty($matched_master_cat)) {
        $seo_title = $matched_master_cat['seo_title'];
        $seo_description = $matched_master_cat['seo_description'];
        $seo_keywords = $matched_master_cat['seo_keywords'];
}



$master_cat_sql="SELECT * FROM master_prd_cat ";
if(!empty($master_cat_slug)){
    $master_cat_sql.=" WHERE mpc_slug != :mpc_slug ";
  
}
$master_cat_sql.=" ORDER BY mpc_order  ASC";
$masCatStmt = $conn->prepare($master_cat_sql);
if (!empty($master_cat_slug)) {
    $masCatStmt->bindValue(':mpc_slug', $master_cat_slug, PDO::PARAM_STR);
}
$masCatStmt->execute();
$master_product_cat = $masCatStmt->fetchAll(PDO::FETCH_ASSOC);
if(!empty($master_cat_slug))
    {
  array_unshift($master_product_cat, ['mpc_name' => 'All Products','mpc_slug'=>null]);
    }

    $product_cat = [];
     $cat_slug = null;
    if(!empty($master_cat_slug)&&$master_cat_slug==='wash-basin'){
        $catSql = "SELECT cate_name AS name, cate_slug AS slug FROM master_category ORDER BY cate_name ASC";
    $catStmt = $conn->prepare($catSql);
    $catStmt->execute();
    $product_cat = $catStmt->fetchAll(PDO::FETCH_ASSOC);
    array_unshift($product_cat, ['name' => 'All Products','slug'=>null]);
    $cat_slug = $_GET['subcategory'] ?? null;
        }


    
    $products = [];
    $page=0;
    $total_pages=0;
  if(empty($master_cat_slug) || $master_cat_slug==='wash-basin')
    {
        
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page = max(1, $page);

            $per_page = 9;
            $start = ($page - 1) * $per_page;


            $countSql = "
                SELECT COUNT(*)
                FROM master_products mp
                INNER JOIN master_category mc ON mc.cate_id = mp.cate_id
                WHERE mp.img1 IS NOT NULL
                AND mp.img1 != ''
            ";

            if (!empty($cat_slug)) {
                $countSql .= " AND mc.cate_slug = :cate_slug";
            }

            $countStmt = $conn->prepare($countSql);

            if (!empty($cat_slug)) {
                $countStmt->bindValue(':cate_slug', $cat_slug, PDO::PARAM_STR);
            }

            $countStmt->execute();
            $total_records = (int) $countStmt->fetchColumn();
            $total_pages = ceil($total_records / $per_page);


            $sql = "
                SELECT p.*, c.cate_name
                FROM master_products p
                INNER JOIN master_category c ON p.cate_id = c.cate_id
                WHERE p.img1 IS NOT NULL
                AND p.img1 != ''
            ";

            if (!empty($cat_slug)) {
                $sql .= " AND c.cate_slug = :cate_slug";
            }

            $sql .= " ORDER BY p.model_name ASC LIMIT :start, :per_page";

            $stmt = $conn->prepare($sql);

            if (!empty($cat_slug)) {
                $stmt->bindValue(':cate_slug', $cat_slug, PDO::PARAM_STR);
            }

            $stmt->bindValue(':start', $start, PDO::PARAM_INT);
            $stmt->bindValue(':per_page', $per_page, PDO::PARAM_INT);

            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
 
    
    


function slugify($text)
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    return strtolower($text);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= htmlspecialchars($seo_title) ?></title>

    <meta name="description" content="<?= htmlspecialchars($seo_description) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($seo_keywords) ?>">

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
	
         .description-text h3{
            text-align:center;
            font-size:40px;

         }
        .description-text p{
            font-size:20px;
            color:black;
            text-align:justify;
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
                                     <?php if (!empty($matched_master_cat)): ?>
                                         <h1><?= htmlspecialchars($matched_master_cat['mpc_name']) ?></h1>
                                        <?php else: ?>
                                         <h1>All Products</h1>
                                        <?php endif;?>
								  <?php if (!empty($master_product_cat)): ?>

        <div class="product-category-filter">
            <?php foreach ($master_product_cat as $master_cat): ?>
              <a href="<?= empty($master_cat['mpc_slug']) 
                            ? BASE_URL.'products/' 
                            : BASE_URL.'products/'.$master_cat['mpc_slug']; ?>"
                   class="item <?= (
                        (!empty($master_cat_slug) && $master_cat_slug === $master_cat['mpc_slug']) ||
                        (empty($master_cat_slug) && empty($master_cat['mpc_slug']))
                   ) ? 'active' : '' ?>">
                   <?= htmlspecialchars($master_cat['mpc_name']); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

       <?php if (!empty($product_cat)): ?>
        <div class="product-category-filter">
            <?php foreach ($product_cat as $category): ?>
              <a href="<?= empty($category['slug']) 
                            ? BASE_URL.'products/'.$master_cat_slug.'/' 
                            : BASE_URL.'products/'.$master_cat_slug.'/' .$category['slug']; ?>"
                   class="item <?= (
                        (!empty($cat_slug) && $cat_slug === $category['slug']) ||
                        (empty($cat_slug) && empty($category['slug']))
                   ) ? 'active' : '' ?>">
                   <?= htmlspecialchars($category['name']); ?>
                </a>
            <?php endforeach; ?>
        </div>
     
        <?php endif; ?>
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
<a href="<?= BASE_URL ?>product/<?= slugify($product['model_name']) ?>/<?= $product['id'] ?>">
<img src="<?= BASE_URL ?>assets/img/products/<?= htmlspecialchars($product['img1']) ?>"
     alt="<?= htmlspecialchars($product['model_name']) ?>">
</a>
</div>

<div class="product-box-content">
<h3><?= htmlspecialchars($product['model_name']) ?></h3>
<p><?= htmlspecialchars($product['txt1']) ?></p>
<p>Product code <?= htmlspecialchars($product['code']) ?></p>
</div>

</div>
</div>
<?php endforeach; ?>
   <?php else: ?>
            <div class="description-text">
               <?= $matched_master_cat['mpc_txt'] ?>
            </div>

<?php endif; ?>

</div>


<div class="pagination" style="display:flex;justify-content:center;gap:10px;font-size:25px;">
<?php
$baseUrl = BASE_URL . 'products/';
if (!empty($master_cat_slug)) {
    $baseUrl .= $master_cat_slug;
}
if (!empty($cat_slug)) {
    $baseUrl .= '/' . $cat_slug;
}
?>

<?php if ($page > 1): ?>
    <a href="<?= $baseUrl ?>?page=<?= $page - 1 ?>">&laquo; Prev</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <a href="<?= $baseUrl ?>?page=<?= $i ?>"
       class="<?= $i === $page ? 'active' : '' ?>">
       <?= $i ?>
    </a>
<?php endfor; ?>

<?php if ($page < $total_pages): ?>
    <a href="<?= $baseUrl ?>?page=<?= $page + 1 ?>">Next &raquo;</a>
<?php endif; ?>
</div>

</div>
</section>

<?php include 'footer.php'; ?>
<?php include 'scripts.php'; ?>

</div>
</body>
</html>
