<?php
include_once 'config/db_conn.php';

$stmt = $conn->prepare("
    SELECT * 
    FROM master_category 
 
");
$stmt->execute();
$washBasinCats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>






<!-- <div class="map-container">
    <img src="<?= BASE_URL ?>assets/img/map-default.jpg" alt="" width="100%">
     <div class="location-search">
         <form action="">
            <div class="form-group">
                <input type="text" placeholder="Your Nearest Showroom (City, Postcode)">
                <input type="submit" value="Search">
            </div>
        </form> 
    </div> 
</div> -->
<footer class="footer">
    <div class="section-container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="footer-top">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-12">
                            <div class="footer-navigation">
                                <p>Home</p>
                                <i class="fa-solid fa-chevron-right"></i>
                                <p>Bathroom</p>
                                <i class="fa-solid fa-chevron-right"></i>
                                 <a href="<?= BASE_URL ?>products">Products</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="d-flex justify-content-lg-end w-100">
                                <i class="fa-solid fa-share-from-square text-white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-12">
                            <div class="footer-social">
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-facebook"></i>
                                <i class="fa-brands fa-linkedin"></i>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="footer-newsletter d-flex justify-content-lg-end w-100">
                                <a href="#"><i class="fa-solid fa-envelope"></i> Newsletter</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-middel">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="column">
                                        <h3>Wash Basins</h3>

                                        <ul>
                                            <?php foreach ($washBasinCats as $cat): ?>
                                                <li>
                                                    <a href="<?= BASE_URL ?>products?cate=<?= $cat['cate_id']; ?>">
                                                        <?= htmlspecialchars($cat['cate_name']); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="column">
                                        <h3>Bath</h3>

                                        <ul>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="column">
                                        <h3>Bath</h3>

                                        <ul>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                            <li><a href="#">Item Name</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="column">
                                        <h3>Quick Links</h3>

                                        <ul>
                                            <li><a href="<?= BASE_URL ?>about-us">About Us</a></li>
                                            <li><a href="<?= BASE_URL ?>contact">Contact Us</a></li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-note text-center">
                    <p class="description-primary">Kelly hoppen™ invites you to experience a world where luxury, quality, and performance meet – transforming bathrooms into timeless expressions of style.</p>
                </div>

                <div class="footer-bottom">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-12">
                            <!-- <div class="footer-navigation">
                                <a href="#">Home</a>
                                <a href="#">Bathroom</a>
                                <a href="#">Contact</a>
                            </div> -->
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="d-flex justify-content-lg-end w-100 justify-content-center">
                                <p class="description-primary">© KELLY HOPPEN 2026.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>