<?php
include_once 'config/db_conn.php';
$stmtCat = $conn->prepare("
    SELECT cate_id, cate_name 
    FROM master_category

    
");
$stmtCat->execute();
$categories = $stmtCat->fetchAll(PDO::FETCH_ASSOC);


?>



<div class="full-header">
    <div class="header-top">
        <div class="header-top-box">
            <a href="#">
                <i class="fa-solid fa-envelope"></i>
                <h6>Email</h6>
            </a>
        </div>
        <div class="header-top-box">
            <a href="#">
                <i class="fa-solid fa-phone"></i>
                <h6>Contact</h6>
            </a>
        </div>
    </div>

    <header id="site-header" class="site-header header-v3">
        <div class="header-mobile">
            <div class="section-padding">
                <div class="section-container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
                            <div class="navbar-header">
                                <button type="button" id="custom-menu-show"
                                    class="navbar-toggle custom-menu-show-mobile"></button>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
                            <div class="site-logo">
                                <a href="<?= BASE_URL ?>">
                                    <img width="600" height="100" src="<?= BASE_URL ?>assets/img/brand-logo.png"
                                        alt="KELLY Hoppen" style="max-width: 160px;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
                            <div class="header-page-link">
                                <div class="search-box">
                                    <div class="search-toggle"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-desktop">
            <div class="header-wrapper">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="row">
                            <div class="col-lg-8 header-left">
                                <div class="site-logo">
                                    <a href="<?= BASE_URL ?>">
                                        <img width="600" height="100" src="<?= BASE_URL ?>assets/img/brand-logo.png"
                                            alt="KELLY HOPPEN" style="max-width: 160px;" />
                                    </a>
                                </div>

                                <div class="site-navigation">
                                    <nav id="main-navigation">
                                        <ul id="menu-main-menu" class="menu">
                                            <li class="level-0 menu-item menu-item-has-children mega-menu current-menu-item sub-menu-show"
                                                cat-id="bathroom">
                                                <a href="javascript:void(0)"><span
                                                        class="menu-item-text">Bathroom</span></a>
                                            </li>
                                            <!-- <li class="level-0 menu-item menu-item-has-children mega-menu current-menu-item sub-menu-show"
                                                cat-id="kitchen">
                                                <a href="javascript:void(0)"><span
                                                        class="menu-item-text">Kitchen</span></a>
                                            </li> -->
                                            <!-- <li class="level-0 menu-item">
                                                <a href="<?= BASE_URL ?>products"><span class="menu-item-text">Products</span></a>
                                            </li> -->
                                            <li class="level-0 menu-item">
                                                <a href="<?= BASE_URL ?>about-us"><span class="menu-item-text">About Us</span></a>
                                            </li>
                                            <li class="level-0 menu-item">
                                                <a href="<?= BASE_URL ?>contact"><span class="menu-item-text">Contact</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-4 header-right">
                                <div class="header-page-link">
                                    <div class="search-box">
                                        <div class="search-toggle"><i class="icon-search"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="custom-sub-menu">
            <div class="close-sub-menu"><i class="fa-solid fa-xmark"></i></div>
            <div class="mobile-navigation">
                <div class="sub-menu-show" cat-id="bathroom">
                    <h5>Bathroom</h5><i class="fa-solid fa-chevron-down"></i>
                </div>
                <!-- <div class="sub-menu-show" cat-id="kitchen">
                    <h5>Kitchen</h5><i class="fa-solid fa-chevron-down"></i>
                </div> -->
                <!-- <div>
                    <a href="<?= BASE_URL ?>products"><h5>Products</h5></a>
                </div> -->
                <div>
                    <a href="<?= BASE_URL ?>about-us">
                        <h5>About Us</h5>
                    </a>
                </div>
                <div>
                    <a href="<?= BASE_URL ?>contact">
                        <h5>Contact</h5>
                    </a>
                </div>
            </div>
            <div class="section-container custom-sub-menu__inner" id="bathroom">

                <div class="bg-light p-3" style="width:280px;">

                    <div class="bg-light p-3" style="width:280px;">

                        <div class="bathroom-menu">



                            <ul class="wash-menu">

                                <li class="wash-item">

                                    <div class="sub-menu-show" cat-id="bathroom">
                                        <a href="javascript:void(0)" class="wash-toggle" tabindex="0"><h5>wash basin</h5><i class="fa-solid fa-chevron-right"></i>
                                   </div>
                            <ul class="wash-submenu">
                            <?php foreach ($categories as $cat): ?>
                                <li>
                                    <a href="<?= BASE_URL ?>products?cate=<?= $cat['cate_id']; ?>">
                                        <?= htmlspecialchars($cat['cate_name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        </li>

                        </ul>







                        <!-- <i class="fa-solid fa-chevron-right"></i> -->
                        </a>
                        <!-- <div class="custom-sub-cat-items">
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 1 <i class="fa-solid fa-chevron-right"></i></a></h5>
                                <div class="custom-sub-cat-item-sub-items">
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 2</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 3</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 4</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 5</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 2</a></h5>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 3 <i class="fa-solid fa-chevron-right"></i></a></h5>
                                <div class="custom-sub-cat-item-sub-items">
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 6</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 7</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 8</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 9</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 4</a></h5>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 5</a></h5>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="custom-sub-cat-main">
                        <div class="custom-sub-cat-main-title">
                            <h4>Novelties</h4><i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="custom-sub-cat-items">
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 1 <i class="fa-solid fa-chevron-right"></i></a></h5>
                                <div class="custom-sub-cat-item-sub-items">
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 2</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 3</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 4</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 5</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 2</a></h5>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 3 <i class="fa-solid fa-chevron-right"></i></a></h5>
                                <div class="custom-sub-cat-item-sub-items">
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 2</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 3</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 4</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 5</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 4</a></h5>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 5</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="custom-sub-cat-main">
                        <div class="custom-sub-cat-main-title">
                            <h4>Novelties</h4><i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="custom-sub-cat-items">
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 1 <i class="fa-solid fa-chevron-right"></i></a></h5>
                                <div class="custom-sub-cat-item-sub-items">
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 2</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 3</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 4</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 5</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 2</a></h5>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 3 <i class="fa-solid fa-chevron-right"></i></a></h5>
                                <div class="custom-sub-cat-item-sub-items">
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 2</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 3</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 4</a></h5>
                                    </div>
                                    <div>
                                        <h5><a href="javascript:void(0)">Item 5</a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 4</a></h5>
                            </div>
                            <div class="custom-sub-cat-item">
                                <h5><a href="javascript:void(0)">Item 5</a></h5>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="section-container p-l-r custom-sub-menu__inner" id="kitchen"> -->
            <!-- <div class="custom-sub-menu-heading">
    <h3 class="text-dark">Kitchen</h3>
    <i class="fa-solid fa-arrow-right"></i>
</div> -->

            <!-- <div class="custom-sub-cat">
        <div class="custom-sub-cat-main">
            <div class="custom-sub-cat-main-title">
                <h4>Products</h4><i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="custom-sub-cat-items">
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 1 <i class="fa-solid fa-chevron-right"></i></a></h5>
                    <div class="custom-sub-cat-item-sub-items">
                        <div>
                            <h5><a href="javascript:void(0)">Item 2</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 3</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 4</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 5</a></h5>
                        </div>
                    </div>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 2</a></h5>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 3 <i class="fa-solid fa-chevron-right"></i></a></h5>
                    <div class="custom-sub-cat-item-sub-items">
                        <div>
                            <h5><a href="javascript:void(0)">Item 2</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 3</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 4</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 5</a></h5>
                        </div>
                    </div>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 4</a></h5>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 5</a></h5>
                </div>
            </div>
        </div> -->
            <!-- <div class="custom-sub-cat-main">
            <div class="custom-sub-cat-main-title">
                <h4>Products</h4><i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="custom-sub-cat-items">
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 1 <i class="fa-solid fa-chevron-right"></i></a></h5>
                    <div class="custom-sub-cat-item-sub-items">
                        <div>
                            <h5><a href="javascript:void(0)">Item 2</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 3</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 4</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 5</a></h5>
                        </div>
                    </div>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 2</a></h5>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 3 <i class="fa-solid fa-chevron-right"></i></a></h5>
                    <div class="custom-sub-cat-item-sub-items">
                        <div>
                            <h5><a href="javascript:void(0)">Item 2</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 3</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 4</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 5</a></h5>
                        </div>
                    </div>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 4</a></h5>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 5</a></h5>
                </div>
            </div>
        </div>
        <div class="custom-sub-cat-main">
            <div class="custom-sub-cat-main-title">
                <h4>Products</h4><i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="custom-sub-cat-items">
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 1 <i class="fa-solid fa-chevron-right"></i></a></h5>
                    <div class="custom-sub-cat-item-sub-items">
                        <div>
                            <h5><a href="javascript:void(0)">Item 2</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 3</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 4</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 5</a></h5>
                        </div>
                    </div>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 2</a></h5>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 3 <i class="fa-solid fa-chevron-right"></i></a></h5>
                    <div class="custom-sub-cat-item-sub-items">
                        <div>
                            <h5><a href="javascript:void(0)">Item 2</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 3</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 4</a></h5>
                        </div>
                        <div>
                            <h5><a href="javascript:void(0)">Item 5</a></h5>
                        </div>
                    </div>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 4</a></h5>
                </div>
                <div class="custom-sub-cat-item">
                    <h5><a href="javascript:void(0)">Item 5</a></h5>
                </div>
            </div> -->
        </div>
</div>
</div>
</div>
</header>
</div>