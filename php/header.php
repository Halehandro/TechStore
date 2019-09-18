<?php 
 if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
   }
?>
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-microchip"></i> TechStore
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-primary bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-danger bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                    <?php
              if (isset($_SESSION['username'])) {?>
                <li class="nav-item ">
                  <a style="padding-left:20px; padding-right: 20px; color:#fff; "><?php echo $username ?></a>
                  <a href="UserSystem/logout.php " class="navbar-btn btn btn-danger ml-3 ">SIGN OUT</a>
                </li>
              <?php } else { ?>
                <li class="nav-item ">
                  <a href="loginForm.php " class="btn btn-success navbar-btn ml-3 waves-effect ">LOGIN</a>
                </li>
                <li class="nav-item ">
                  <a href="registerForm.php " class="btn btn-primary ml-3 navbar-btn waves-effect " style="margin-top: 15px;">REGISTER</a>
                </li>
              <?php } ?>
                </a>
            </div>
        </div>

    </nav>
</header>






