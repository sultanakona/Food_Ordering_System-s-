<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['submit'])){
   $insert_promo_code = $conn->prepare("INSERT INTO `promo_codes`(promo_code_name, amount,expire_date) VALUES(?,?,?)");
      $insert_promo_code->execute([$_POST['promo_name'],$_POST['promo_amt'],$_POST['promo_expire_date']]);
      if($insert_promo_code){
         header('location:dashboard.php');
      }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <style>
      table,tr,td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 7px;
    font-size: 14px;
    text-align: center;
}
section#codes {
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
table{
   margin-top:30px;
}
   </style>
</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin profile update section starts  -->

<section id="codes">
   <h1 class="title">All Promo Codes</h1>
   <table border="1px solid" >

    <tr>
        <th>Id</th>
        <th>Promo Code Name</th>
        <th>Amount (Percentage)</th>
        <th>Expire Date</th>
    </tr>
    <tbody>
        <?php 
        $promo_codes = $conn->prepare("SELECT * FROM promo_codes");
        $promo_codes->execute();
        $results = $promo_codes->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($results)>0){
         foreach ($results as $result) {
            echo '
                <tr>
                    <td>' . htmlspecialchars($result['id']) . '</td>
                    <td>' . htmlspecialchars($result['promo_code_name']) . '</td>
                    <td>' . htmlspecialchars($result['amount']) . '%</td>
                    <td>' . htmlspecialchars($result['expire_date']) . '</td>
                </tr>
            ';
        }
        }else{
         echo '<tr><td colspan="4">No promo codes found.</td></tr>';
        }
        ?>
    </tbody>
</table>

</section>

<section class="form-container">

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h3>Add Promo Code</h3>
      <input type="text" name="promo_name" class="box"placeholder="Promo Code Name">
      <input type="number" name="promo_amt" placeholder="Promo Code Amount(percentage)" class="box">
      <input type="date" name="promo_expire_date" placeholder="Expire Date" class="box">
      <input type="submit" value="Add" name="submit" class="btn">
   </form>

</section>