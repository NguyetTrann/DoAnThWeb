<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include "layout/headpage.php";?>
</head>

<body>
<?php include "layout/bannerpage.php" ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/hoacuoi/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>ĐĂNG NHẬP</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Đăng nhập</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="../controller/UserController.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tên đăng nhập<span>*</span></p>
                                        <input type="text" id="username" name="username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Mật khẩu<span>*</span></p>
                                        <input type="password"  id="pass" name="pass">
                                    </div>
                                </div>
                            </div>
                        <div><button type="submit" id="user" name="user" value="login">Đăng nhập</button></div>
                </form>

                            <p>Tạo tài khoản bằng cách nhập thông tin bên dưới. Nếu bạn là khách hàng cũ, vui lòng đăng nhập ở đầu trang</p>
                            <div class="checkout__input">
                                <p>Mật khẩu<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text"
                                    placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: lưu ý đặc biệt để giao hàng.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Tên sản phẩm <span>Tổng đơn</span></div>
                                <ul>
                                    <li>Hoa hồng cưới <span>700.000 VNĐ</span></li>
                                    <li>Hoa hướng dương bó nhỏ <span>300.000 VNĐ</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">Tổng phụ <span>1.000.000 VNĐ</span></div>
                                <div class="checkout__order__total">Tổng <span>1.000.000 VNĐ</span></div>
                            
                                
                                <button type="submit" class="site-btn">ĐẶT HÀNG</button>
                            </div>
                        </div>
                    </div>
                <form method ="POST" action="../controller/admincontroller.php
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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