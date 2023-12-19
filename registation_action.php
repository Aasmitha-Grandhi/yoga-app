<?php
$postData = $_POST;
// echo "<pre>";
// print_r($postData);exit;
try {
	if(!isset($postData['name']) || trim($postData['name']) == '') {
		throw new Exception("Please add the Name",0);
	}
	if(!isset($postData['email']) || trim($postData['email']) == '') {
		throw new Exception("Please add the email",0);
	}
	if(!isset($postData['password']) || trim($postData['password']) == '') {
		throw new Exception("Please enter a password",0);
	}
	if(!isset($postData['mobile']) || trim($postData['mobile']) == '') {
		throw new Exception("Please enter a mobile",0);
	}
	if(!isset($postData['age']) || trim($postData['age']) == '') {
		throw new Exception("Please enter a Age",0);
	}
	if(!isset($postData['batch_timing']) || trim($postData['batch_timing']) == '') {
		throw new Exception("Please enter a Start Date",0);
	}

	include 'database.php';
	$branchName = test_input($postData['name']);
	$branchCodeMatch = test_input($postData['email']);
	session_start();
	$_SESSION['user_name'] = $branchName;
	$branchCode = "SELECT `vEmail` FROM user_table WHERE vEmail = '$branchCodeMatch'";
	$stmt = $conn->prepare($branchCode);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$branchCodes = $stmt->fetchAll();
	// print_r($branchCodes);exit;
	if(is_array($branchCodes)&& count($branchCodes)>0){
		throw new Exception($branchCodes[0]['vEmail']." "."email Is Exits");
	}
	$selectData = test_input($postData['password']); 
	$mobile_number = test_input($postData['mobile']);
	$age = test_input($postData['age']); 
	$addDate = test_input($postData['batch_timing']); 

	// $addDate = date('Y-m-d H:i:s');
	$sql = "INSERT INTO user_table(`vName`,`vEmail`,`vMobile`,`vPassword`,`dtAddedDate`,`iAge`) VALUES('".$branchName."','".$branchCodeMatch."','".$mobile_number."','".$selectData."','".$addDate."','".$age."')";
	$conn->exec($sql);
    $last_id = $conn->lastInsertId();
    // print_r($last_id);exit;

  	if(intval($last_id)<=0){
    	throw new Exception("unable insert the data",0);
    }
	$_SESSION['user_data'] = [
        'last_id' => $last_id
    ];
    echo "<script>alert('Successfully Registation Completed');</script>";
    // header("location:/public_html/login_form.php");exit;
     echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/login_form.php";</script>';exit;
 }catch (Exception $e) {
	$message = $e->getMessage();
    $_SESSION['message'] = $message;
	//header("location:registation_form.php");exit;
	echo '<script type="text/javascript">window.location.href = "https://yogaapplication.000webhostapp.com/registration_form.php";</script>';exit;
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}	
?>