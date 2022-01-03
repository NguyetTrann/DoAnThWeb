<?php
include "./controller/autoload.php";
include "./dao/AdminDAO.php";
$users = AdminDAO::getAllAdmin($conn);
?>

<?php include "layout/desktopsidebar.php"; ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
  <div class="" style="margin-top: 2rem; margin-right:2rem;">
      <a href="themadmin.php" class="btn btn-dark" style="float: right; color: white">Thêm nhân viên</a>
    </div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Quản lý nhân viên
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Nhân viên</th>
              <th class="px-4 py-3">Mã </th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">SĐT</th>
              <th class="px-4 py-3">Password</th>
              <th class="px-4 py-3">Hành động</th>
            </tr>
          </thead>

          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            
          <?php foreach ($users as $user): ?>

            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="<?php echo "./assets/".$user['avatar'] ?>" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold"><?php echo $user['username'] ?></p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm"><?php echo $user['ma'] ?>
              </td>
              <td class="px-4 py-3 text-sm"> <?php echo $user['email'] ?> </td>
              <td class="px-4 py-3 text-sm">
              <?php echo $user['sdt'] ?>
              </td>
              <td class="px-4 py-3 text-xs">
              <?php echo $user['password'] ?>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="./editadmin.php?ma=<?php echo $user['ma']?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                  </a>
                  <a href="./controller/loginadminController.php?action=delete&ma=<?php echo $user['ma'] ?>" >
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