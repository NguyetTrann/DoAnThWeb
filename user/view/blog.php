<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include "layout/headpage.php";?>
</head>

<body>
<?php include "layout/bannerpage.php" ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/categories/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Thể loại </h4>
                            <ul>
                                <li><a href="#">Tính cách</a></li>
                                <li><a href="#">Màu sắc</a></li>
                                <li><a href="#">Mẹo</a></li>
                            </ul>
                        </div>
                      
                        <div class="blog__sidebar__item">
                            <h4>Tìm kiếm</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Hoa hồng</a>
                                <a href="#">Hoa mẫu đơn</a>
                                <a href="#">Sen đá mix</a>
                                <a href="#">Hoa để bàn giá rẻ</a>
                                <a href="#">Mẹo hoa tươi lâu</a>
                                <a href="#">Hoa hợp với tính cách</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="img/categories/2.jpg" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> Nov 2,2021</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Sao xanh giữ được màu lâu?  </p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="img/categories/5.jpg" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> Nov 4,2021</li>
                                        <li><i class="fa fa-comment-o"></i> 6</li>
                                    </ul>
                                    <h5><a href="#">Làm hoa hồng khô từ hoa hồng</a></h5>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="img/categories/hoadeban.jpg" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> Nov 4,2021</li>
                                        <li><i class="fa fa-comment-o"></i> 9</li>
                                    </ul>
                                    <h5><a href="#">Cách để bình hoa tươi lâu hơn</a></h5>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="img/hoacuoi/4.jpg" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> Nov 6,2021</li>
                                        <li><i class="fa fa-comment-o"></i> 16</li>
                                    </ul>
                                    <h5><a href="#">Mẹo chọn hoa cưới cho nàng</a></h5>
                                    <p>Các nàng dâu chọn hoa theo sở thích và màu áo</p>
                                    <a href="#" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include "layout/footerpage.php" ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>