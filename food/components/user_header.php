<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <div class="logo__header">
         <a href="home.php" class="logo">
            <img src="images/images.png" alt="">
         </a>
      </div>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="menu.php">Menu</a>
         <a href="orders.php">Orders</a>
         <a href="contact.php">Contact</a>
      </nav>
      <div class="search-box">
         <input type="text" placeholder="Enter your search item" class="search-input" id="search-input">
         <div class="search-item-box">
         </div>
      </div>
      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <!-- <a href="search.php"><i class="fas fa-search"></i></a> -->
         
         
       
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">Profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">Logout</a>
         </div>
         <p class="account">
            <a href="login.php">Login</a> or
            <a href="register.php">Register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">Please login first!</p>
            <a href="login.php" class="btn">Login</a>
         <?php
          }
         ?>
      </div>

   </section>

   <?php

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

// $promo_codes = $conn->prepare("
//    SELECT promo_codes.*,promo_usage.*
//    FROM promo_usage
//    LEFT JOIN promo_codes ON promo_usage.promo_code_id != promo_codes.id
//    AND promo_usage.user_id != $user_id
// ");

// $promo_codes = $conn->prepare("
//    SELECT promo_usage.*,promo_codes.*
//    FROM promo_usage
//    LEFT JOIN promo_codes ON promo_usage.promo_code_id != promo_codes.id
//    AND promo_usage.user_id != $user_id
// ");

// $promo_codes->execute();
// $results = $promo_codes->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($results);
// echo "</pre>";

// die();  

      // if (!empty($results)) {
      //    $promo_flag= true;
      //    echo "<div id='promo'>";
      //    foreach ($results as $result) {
      //       echo '<div class="coupon">
      //          <span>'. $result['promo_code_name'] . '</span>
      //          <span>'.$result['amount'].'%</span>
      //       </div>';
      //    }

      //    echo "</div>";
      // } else{
      //    $promo_flag = false;
      // }
   ?>


</header>

