<?php
$postData = $_POST;
session_start();
echo "<pre>";
// print_r($postData);exit;
try {
    if(!isset($postData['email']) || trim($postData['email']) == '') {
        throw new Exception("Please Email address",0);
    }
    if(!isset($postData['batch_timing']) || trim($postData['batch_timing']) == '') {
        throw new Exception("Please Change Your Period Timing",0);
    }
    
    include 'database.php';
   $user_email = test_input($postData['email']);
    $update_time = test_input($postData['batch_timing']);

    $sqlUpdate = "UPDATE user_table SET dtAddedDate=:date_period WHERE vEmail = :user_email";
    $sqlData = $conn->prepare($sqlUpdate);
    $sqlData->bindParam(":user_email", $user_email);
    $sqlData->bindParam(":date_period", $update_time);

    $sqlData->execute();

    $_SESSION['user_data'] = [
        'user_name' => $postData['fullName'],
        'user_email'=> $postData['email']
    ];
   echo "<script>alert('Successfully changed batch timing');</script>";
   //header("location:user_after_payment_listing.php");exit;
    echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/user_after_payment_listing.php";</script>';exit;
    
}catch (Exception $e) {
    $message = $e->getMessage();
    print_r($message);exit;
    $_SESSION['message'] = $message;
    //header("location:edit_batch_form.php");exit;
    echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/edit_batch_form.php";</script>';exit;
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
