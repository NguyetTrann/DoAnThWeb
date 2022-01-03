<?php
include "./controller/autoload.php";
include "./dao/ProductDAO.php";
$product = ProductDAO::getProduct($_GET["masp"], $conn);
?>

<?php include "layout/desktopsidebar.php"; ?>
<?php
$loi = "";
if (!empty($_SESSION['error'])) {
  $error = $_SESSION['error'];
  $loi .= "<p>$error</p>";
  unset($_SESSION["error"]);
}
?>

<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2> <?php echo $loi; ?> </h2>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Thêm sản phẩm
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

      <div class="card-body card-block">
        <form action="./controller/productController.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
          <label hidden style="font-size:20px;margin-top: 15px;margin-bottom: 7px">Mã sản phẩm</label>
          <input type="text" style="margin-top: 10px; font-size:20px; width: 200px; float:right" name="masp" value="<?php echo $product['masp'] ?>" hidden><br>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;"><label class=" form-control-label">Tên sản phẩm</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="tensp" value="<?php echo $product['tensp'] ?>" placeholder="thêm tên" class="form-control"></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;"><label for="password-input" class=" form-control-label">Giá</label></div>
            <div class="col-12 col-md-9"><input type="text" id="password-input" name="gia" placeholder="200.000" value="<?php echo $product['gia'] ?>" class="form-control"></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;">
            <label for="file-input" class=" form-control-label">Hình ảnh</label></div>
            <div class="pic" style="width: 200px; height: 250px; margin-left:20px; border: 1px solid;">
            <img name="hinh" id="hinh" style="min-width: 200px; max-height: 250px;" src="" alt></div>
            <div style="margin-left: 20px;"><input style="margin-top: 10px; font-size:16px" name="hinh" type="file" id="myFile" name="filename">
            </div>
          </div>

          <div>
            <button type="submit" name="action" value="updateSP" class="btn btn-primary btn-sm">
              <i class="fa fa-dot-circle-o"></i> Update
            </button>
            <button type="reset" name="btnReset" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Reset
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</main>
</div>
</div>
</body>
<script src="./assets/js/previewimg.js"></script>
</html>