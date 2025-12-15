<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> -->

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      .swiper {
   width: 600px;
   height: 300px;
 }
 .swiper-button-next,
.swiper-button-prev {
    color: #fff; /* Adjust color as needed */
    width: 50px;
    height: 50px;
}

.swiper {
   width: 100%; /* Full width */
   height: 80vh; /* Full height of the viewport */
   position: relative;
}

.swiper-slide {
   display: flex;
   align-items: center;
   justify-content: center;
   position: relative;
}

.swiper-slide img {
   width: 100%; /* Stretch image to full width */
   height: 100%; /* Stretch image to full height */
   object-fit: cover; /* Maintain aspect ratio and cover the area */
}
.image {
    width: 500px;
}

.content {
    position: absolute;
    top: 50%;
    right: 10%;
}

.content span {
    font-size: 25px;
}

.content h3 {
    font-size: 18px;
}

   </style>

</head>
<body>

<?php include 'components/user_header.php'; ?>



<!-- <section class="hero"> -->

   <!-- <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order online</span>
               <h3>Delicious pizza</h3>
               <a href="menu.php" class="btn">See menus</a>
            </div>
            <div class="image">
               <img src="images/home-img-1.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order online</span>
               <h3>Chezzy hamburger</h3>
               <a href="menu.php" class="btn">See menus</a>
            </div>
            <div class="image">
               <img src="images/home-img-2.png" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order online</span>
               <h3>Rosted chicken</h3>
               <a href="menu.php" class="btn">See menus</a>
            </div>
            <div class="image">
               <img src="images/home-img-3.png" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div> -->

   <!-- Slider main container -->
   <div class="swiper">
   <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
         <div class="content">
            <span>Order online</span>
            <h3>Chezzy hamburger</h3>
            <a href="menu.php" class="btn">See menus</a>
         </div>
         <div class="image">
            <img src="images/home-img-2.png" alt="">
         </div>
      </div>
      <div class="swiper-slide">
         <div class="content">
            <span>Order online</span>
            <h3>Delicious pizza</h3>
            <a href="menu.php" class="btn">See menus</a>
         </div>
         <div class="image">
            <img src="images/home-img-1.png" alt="">
         </div>
      </div>
      <div class="swiper-slide">
         <div class="content">
            <span>Order online</span>
            <h3>Rosted chicken</h3>
            <a href="menu.php" class="btn">See menus</a>
         </div>
         <div class="image">
            <img src="images/home-img-3.png" alt="">
         </div>
      </div>
   </div>
   <!-- Pagination -->
   <div class="swiper-pagination"></div>
   <!-- Navigation -->
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
   <!-- Scrollbar -->
</div>


<!-- </section> -->

<section class="category">

   <h1 class="title">Food category</h1>

   <div class="box-container">

      <a href="category.php?category=fast food" class="box">
         <img src="images/cat-1.png" alt="">
         <h3>Fast food</h3>
      </a>

      <a href="category.php?category=main dish" class="box">
         <img src="images/cat-2.png" alt="">
         <h3>Main dishes</h3>
      </a>

      <a href="category.php?category=drinks" class="box">
         <img src="images/cat-3.png" alt="">
         <h3>Drinks</h3>
      </a>

      <a href="category.php?category=desserts" class="box">
         <img src="images/cat-4.png" alt="">
         <h3>Desserts</h3>
      </a>

   </div>

</section>




<section class="products">

   <h1 class="title">Latest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>৳</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">Veiw all</a>
   </div>

</section>

<!-- Popular Products -->

<section class="products">

   <h1 class="title">Popular dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` where sale_count > 0 ORDER BY `sale_count` DESC Limit 3");
         $select_products->execute();
         // $items = $select_products->fetchAll(PDO::FETCH_ASSOC);
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>৳</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No product found!!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">View all</a>
   </div>

</section>



<?php 

if(isset($_SESSION['user_id'])){
   include_once 'rating.php';
}

?>

<?php include 'components/footer.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

// var swiper = new Swiper(".hero-slider", {
//    loop:true,
//    grabCursor: true,
//    effect: "flip",
//    pagination: {
//       el: ".swiper-pagination",
//       clickable:true,
//    },
// });
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal', // Slider direction
        loop: true, // Enable looping
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
        },
    });
});

const swiper = new Swiper('.swiper', {
  // Set to horizontal direction (default)
  direction: 'horizontal',
  loop: true, // Enables continuous looping

  // Enable pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true, // Allows clicking on pagination bullets
  },

  // Enable navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // Enable scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
    draggable: true, // Makes the scrollbar draggable
  },
});


</script>

</body>
</html>