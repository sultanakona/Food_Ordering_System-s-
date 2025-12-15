<?php
include 'components/connect.php';
if (isset($_GET['searchString'])) {
    $value = $_GET['searchString'];
    
    $sql = "SELECT * FROM `products` WHERE `name` LIKE :searchValue";

    try {
        $select_user = $conn->prepare($sql);
        
        $select_user->bindValue(':searchValue', '%' . $value . '%', PDO::PARAM_STR);
        $select_user->execute();
        
        // Fetch all results
        $results = $select_user->fetchAll(PDO::FETCH_ASSOC);
        // print_r($results);
        // die();
        echo json_encode($results);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
if (isset($_GET['promoCodeName'])) {

    $value = trim($_GET['promoCodeName']);

    if($value ==''){
       
        exit;
    }

    $sql = "SELECT * FROM `promo_codes` WHERE `promo_code_name` LIKE :searchValue";

 
        $select_user = $conn->prepare($sql);
        
        $select_user->bindValue(':searchValue', '%' . $value . '%', PDO::PARAM_STR);
        $select_user->execute();
        
        $results = $select_user->fetchAll(PDO::FETCH_ASSOC);
        if(count($results)==0){
            exit;
        }else{
            echo json_encode($results);

        }
    } 




if(isset($_POST['ratingBtn'])){
    $text=trim($_POST['message']);
    $rate=$_POST['ratingNumber'];
    $username=$_POST['userName'];
    if(empty($text)){
        $message[] = 'confirm password not matched!';
    }else{
        $insert_user = $conn->prepare("INSERT INTO `rating_tbl`(rating_text, rating_user_id,rating,username) VALUES(?,?,?,?)");
        $insert_user->execute([$text, $_POST['userId'],$rate,$username]);
         if($insert_user){
            header('location:home.php');
         }
    }
}
?>
