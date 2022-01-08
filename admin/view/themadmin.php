<?php
include "../controller/autoload.php";
include "../dao/AdminDAO.php";
// var_dump($_GET["makh"]);
// exit();
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
      Thêm nhân viên
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

      <div class="card-body card-block">
        <form action="./controller/loginadminController.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
       
          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;" hidden><label class=" form-control-label">Mã nhân viên</label></div>
            <div class="col-12 col-md-9"><input name="ma" class="form-control" type="text"  value="" hidden></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;"><label class=" form-control-label">Tên nhân viên</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="username" value="" placeholder="điền tên" class="form-control"></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;"><label for="password-input" class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9"><input type="text" id="password-input" name="email" value="" placeholder="abc@gmail.com" class="form-control"></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;"><label class=" form-control-label">Sđt</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="sdt" value="" placeholder="điền số điện thoại" class="form-control"></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;"><label class=" form-control-label">Password</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="password" value="" placeholder="điền password" class="form-control"></div>
          </div>

          <div class="row form-group">
            <div class="col col-md-3" style="margin-top: 0.8rem;">
            <label for="file-input" class=" form-control-label">Avatar</label></div>
            <div class="pic" style="width: 150px; height: 150px; margin-left:20px; border: 1px solid; border-radius:75px;">
            <img name="hinh" id="hinh" style="min-width: 150px; max-height: 150px;border-radius:75px; background-color:aqua" src="" alt></div>
            <div style="margin-left: 20px;"><input style="margin-top: 10px; font-size:16px" name="hinh" type="file" id="myFile" name="filename">
            </div>
          </div>

          <div>
            <button type="submit" name="action" value="addnhanvien" class="btn btn-primary btn-sm">
              <i class="fa fa-dot-circle-o"></i> Add
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