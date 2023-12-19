<?php
$postData = $_POST;
session_start();
// echo "<pre>";
// print_r($postData);exit;
try {
    if(!isset($postData['email']) || trim($postData['email']) == '') {
        throw new Exception("Please Email address",0);
    }
    if(!isset($postData['password']) || trim($postData['password']) == '') {
        throw new Exception("Please enter a password",0);
    }
    include 'database.php';
    $user_email = test_input($postData['email']);
    $password = test_input($postData['password']);
    $login_date = date('Y-m-d H:i:s');
    $sql = "SELECT vName,vEmail, vPassword FROM user_table WHERE vEmail = '$user_email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $login_data = $stmt->fetchAll();
     // print_r($login_data);exit;
    if(is_array($login_data) && count($login_data)>0){
      $password_match =  $login_data[0]['vPassword'];
      // print_r($password_match);exit;
      if ($password_match == $password) {
            $_SESSION['user_data'] = [
                'user_name' => $login_data[0]['vName'],
                'user_email'=> $login_data[0]['vEmail']
            ];
          echo "<script>alert('Successfully Login User');</script>";
          //header("location:payment_form.php");exit;
          echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/payment_form.php";</script>';exit;
      }else{
         throw new Exception("Incorrect password",0);
      }
    }else{
        throw new Exception("Invalide Email",0);
    }
}catch (Exception $e) {
    $message = $e->getMessage();
    $_SESSION['message'] = $message;
    //header("location:login_form.php");exit;
    echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/login_form.php";</script>';exit;
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
