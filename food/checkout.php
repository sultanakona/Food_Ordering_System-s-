<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){
   $coupon_name= isset($_POST['coupon_name']) ? $_POST['coupon_name'] : "null";
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];
   $promo_id = $_POST['promo_id']==""? null : $_POST['promo_id'];
   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";
   // die();
   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);
   if($check_cart->rowCount() > 0){

      if($address == ''){
         $message[] = 'please add your address!';
      }else{
         $cart_items = $check_cart->fetchAll(PDO::FETCH_ASSOC);
         foreach($cart_items as $item){
            $update_cart=$conn->prepare("UPDATE products set sale_count=sale_count+1 where id= ?");
            $update_cart->execute([$item['pid']]);
         }
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
         $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);
         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);

         if($promo_id!=null){
            $insert_promo = $conn->prepare("INSERT INTO `promo_usage`(promo_code_id, user_id) VALUES(?,?)");
            $insert_promo->execute([$promo_id, $user_id]);
         }

         $message[] = 'order placed successfully!';
      }
      
   }else{
      $message[] = 'your cart is empty';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>checkout</h3>
   <p><a href="home.php">home</a> <span> / checkout</span></p>
</div>

<section class="checkout">

   <h1 class="title">order summary</h1>

<form action="" method="post">

   <div class="cart-items">
      <h3>cart items</h3>
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
      <p>
         <span class="name"><?= $fetch_cart['name']; ?></span>
         <span class="price">৳<?= $fetch_cart['price']; ?> x <?= $fetch_cart['quantity']; ?></span>
      </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
      <p class="grand-total"><span class="name">grand total :</span><span class="price" id="price">৳<?= $grand_total; ?></span></p>
      <input type="text" class="coupon_name" placeholder="Enter the coupon name" name="coupon_name" > <br>
      <a href="cart.php" class="btn">View cart</a>
   </div>

   <input type="hidden" name="total_products" value="<?= $total_products; ?>">
   <input type="hidden" class="promo_id" name="promo_id" value="0">
   <input type="hidden" name="total_price" class="total_amount" value="<?= $grand_total; ?>" >
   <input type="hidden" name="name" value="<?= $fetch_profile['name'] ?>">
   <input type="hidden" name="number" value="<?= $fetch_profile['number'] ?>">
   <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?>">
   <input type="hidden" name="address" value="<?= $fetch_profile['address'] ?>">

   <div class="user-info">
      <h3>your info</h3>
      <p><i class="fas fa-user"></i><span><?= $fetch_profile['name'] ?></span></p>
      <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number'] ?></span></p>
      <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email'] ?></span></p>
      <a href="update_profile.php" class="btn">update info</a>
      <h3>delivery address</h3>
      <p><i class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address'] == ''){echo 'please enter your address';}else{echo $fetch_profile['address'];} ?></span></p>
      <a href="update_address.php" class="btn">update address</a>
      <select name="method" class="box" required>
         <option value="" disabled selected>select payment method --</option>
         <option value="cash on delivery">cash on delivery</option>
         <option value="credit card">credit card</option>
         <option value="Bkash">Bkash</option>
         <option value="Nagad">Nagad</option>
         <option value="Rocket">Rocket</option>
         <option value="Upay">Upay</option>
      </select>
      <input type="submit" value="place order" class="btn <?php if($fetch_profile['address'] == ''){echo 'disabled';} ?>" style="width:100%; background:var(--red); color:var(--white);" name="submit">
   </div>

</form>
   
</section>









<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
   // Store the original price to restore it when input is empty
const prevPriceElement = document.querySelector('.total_amount');
const priceBox = document.querySelector('#price');
const promoId = document.querySelector('.promo_id');
const originalPrice = parseFloat(prevPriceElement.value);

document.querySelector('.coupon_name').addEventListener('input', (e) => {
    const searchValue = e.target.value.trim();
    const prevPrice = parseFloat(prevPriceElement.value);

    if (searchValue !== "" || prevPrice >= 1000) {
      console.log(prevPrice, priceBox)
        fetch(`actions.php?promoCodeName=${encodeURIComponent(searchValue)}`)
            .then(response => response.text())
            .then(data => {
                if (data.length !== 0) {
                     var jsonData = JSON.parse(data);
                    const promo_id = jsonData[0]['id'];
                    const amount = jsonData[0]['amount'];

                    const discount = originalPrice * (amount / 100);
                    const newPrice = originalPrice - discount;

                    prevPriceElement.value = newPrice.toFixed(2); 
                    prevPriceElement.textContent = `${newPrice.toFixed(2)}`; 
                    priceBox.value=newPrice.toFixed(2);
                    priceBox.textContent = `${newPrice.toFixed(2)}`; 
                    promoId.value=promo_id;

                   
                }else{
                  prevPriceElement.value = originalPrice.toFixed(2); 
                prevPriceElement.textContent = `${originalPrice.toFixed(2)}`;
                priceBox.value=originalPrice.toFixed(2);
                priceBox.textContent = `${originalPrice.toFixed(2)}`; 
                promoId.value=0;
                }
            });
    } else {
        prevPriceElement.value = originalPrice.toFixed(2); 
        prevPriceElement.textContent = `${originalPrice.toFixed(2)}`;
        priceBox.value=originalPrice.toFixed(2);
         priceBox.textContent = `${originalPrice.toFixed(2)}`; 
        promoId.value=0;
    }
});
</script>
</body>
</html>