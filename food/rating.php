<?php

include 'components/connect.php';



if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $user_email = $_SESSION['user_email'];
   $user_name = $_SESSION['user_name'];
}else{
   $user_id = 'Nothing';
   $user_email ="";
   $user_name = '';
};

?>

<section id="rating">
   <h1 class="title">Say Something About Us</h1>
   <form action="actions.php" method="post">
      <div class="form-item">
         <label for="title">Your E-mail</label><br><br>
         <input type="number" value="<?php echo $user_id; ?>" id="userId" readonly name="userId" hidden>
         <input type="text" value="<?php echo $user_name; ?>" id="userName" readonly name="userName" hidden>
         <input name="raringText" type="text" readonly placeholder="Enter your E-mail" id="userEmail" value="<?php echo $user_email; ?>">
      </div>
      <div class="form-item">
         <label for="message">Your Message</label><br><br>
         <textarea id="ratingText" name="message" id="" cols='20' rows="4"></textarea>
      </div>
      <div class="rate">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      <input type="number" id="ratingNumber" name="ratingNumber" value="0" hidden read_exif_data>
      <button type="submit" name="ratingBtn" value="submit">Submit</button>
   </form>
</section>