<?php
$postData = $_POST;
// echo "<pre>";
// print_r($postData);exit;
try {
	if(!isset($postData['email']) || trim($postData['email']) == '') {
		throw new Exception("Please add the email",0);
	}
	include 'database.php';
	$fee = 500;
	$email = test_input($postData['email']);
	$sql = "INSERT INTO fee_paid (`iFee`, `vEmail`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $fee, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->execute();
    $last_id = $conn->lastInsertId();
    // print_r($last_id);exit;
  	if(intval($last_id)<=0){
    	throw new Exception("unable insert the data",0);
    }
    echo "<script>alert('Payment Successfully Completed');</script>";
    //header("location:user_after_payment_listing.php");exit;
    echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/user_after_payment_listing.php";</script>';exit;
} catch (Exception $e) {
	$message = $e->getMessage();
	print_r($message);exit;
    $_SESSION['message'] = $message;
	//header("location:payment_form.php");exit;
	echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/payment_form.php";</script>';exit;
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	
?>