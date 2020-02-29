<?php
$getNumberMessage = new Statistics();

$messages = $getNumberMessage->getUnReadMessages();
$NumberAll = $getNumberMessage->getNumberMessages();
?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>

    </ul>


    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown show">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                  <i class="fa fa-address-card"></i>
                  <span class="badge badge-danger navbar-badge"><?php echo $NumberAll ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                 <?php foreach ($messages as $item): ?>
                  <a href="/admin/resours/xabarlar/oneXabar.php?findMessage=<?=$item['id']?>" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="/admin/uploads/logo/logo.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                 <?= $item['title']?>
                                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm"><?=$item['message']?></p>
                              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= date('i',time() - $item['created_at']) .' minut oldin yuborilgan'  ?></p>
                          </div>
                      </div>
                      <!-- Message End -->
                  </a>
                  <div class="dropdown-divider"></div>
                    <?php endforeach; ?>
                  <a href="/admin/resours/xabarlar/xabar.php" class="dropdown-item dropdown-footer">
                      <?php
                      if ($NumberAll ==0){
                          echo 'O\'qilmagan xabarlar mavjud emas';
                      }else{
                          echo 'O\'qilmagan xabarlar';
                      }
                      ?>

                  </a>
              </div>
          </li>
          <!-- Messages Dropdown Menu -->
          <li id="grey" onmouseover="grey()" onmouseout="white()" class="nav-item dropdown show">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                  <i class="far fa-user"></i>
                  <span class="badge badge-danger navbar-badge"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                  <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                          <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                          <div class="media-body">
                              <h3 class="dropdown-item-title">
                                  <?= $_SESSION['fio'] ?>
                                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                              </h3>
                              <p class="text-sm"><?= date('i',time() - $_SESSION['time']) .' minutdan beri aktivsiz'  ?></p>

                          </div>
                      </div>
                      <!-- Message End -->
                  </a>

                  <a href="../admin/app/LogOut.php" class="dropdown-item dropdown-footer">Tizimdan chiqish</a>
              </div>
          </li>

      </ul>

    <!-- Right navbar links -->
   
  </nav>
 
<script>
    function grey() {
        document.getElementById('grey').style.backgroundColor = 'grey';
    }
    function white() {
        document.getElementById('grey').style.backgroundColor = 'white';
    }
</script>
