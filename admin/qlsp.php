<?php
include "./controller/autoload.php";
include "./dao/ProductDAO.php";
$products = ProductDAO::getAllProduct($conn);
?>

<?php include "layout/desktopsidebar.php"; ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <div class="" style="margin-top: 2rem; margin-right:2rem;">
      <a href="themsp.php" class="btn btn-dark" style="float: right; color: white">Thêm sản phẩm</a>
    </div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Quản lý sản phẩm
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Tên sản phẩm</th>
              <th class="px-4 py-3">Hình</th>
              <th class="px-4 py-3">Giá</th>
              <th class="px-4 py-3">Hành động</th>
            </tr>
          </thead>

          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

            <?php foreach ($products as $product) : ?>

              <tr class="text-gray-700 dark:text-gray-400" >
                <td class="px-4 py-3 text-sm"><?php echo $product['masp'] ?> </td>
                <td class="px-4 py-3 text-sm"><?php echo $product['tensp'] ?></td>
                <td class="px-4 py-3 text-sm"><div style="max-width:50px; max-height:85px"><img src="<?php echo "./assets".$product["hinh"] ?>" alt=""></div></td>
                <td class="px-4 py-3 text-sm"><?php echo  number_format($product['gia'],0,",",".")." VND"?> </td>
                <td class="px-4 py-3">
                  <div class="flex items-center space-x-4 text-sm">
                    <a href="./editsp.php?masp=<?php echo $product['masp'] ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                      </svg>
                    </a>
                    <a href="./controller/productController.php?action=delete&masp=<?php echo $product['masp'] ?>">
                      <i class="fa fa-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</main>
</div>
</div>
</body>

</html>