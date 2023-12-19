<?php
    session_start();
    $message="";
    if(isset($_SESSION['message'])){
         $message = $_SESSION['message'];
         unset($_SESSION['message']);
    }
    include "database.php";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Landing Page</title>
</head>
<body>
<div class="error text-center">
    <?php
        $get = $_GET;
        if(isset($get['message'])){
            $mess = $get['message'];
            print_r($mess);  
        }
    ?>
</div>
<!-- Header -->
<header class="bg-dark text-white text-center py-5">
    <h1>Welcome to Our Website</h1>
    <p>Explore and Connect</p>
</header>

<!-- Card Section -->
<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-danger text-center"><?php echo $message ?></div>
                    <form action="registation_action.php" method="post" id="form_data" class="student_validate" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" >
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" >
                        </div>
                        <div class="form-group">
                            <label for="number">Number<span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="number" name="mobile" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label for="age">Age<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" min="18" max="65">
                        </div>
                        <div class="form-group">
                            <label>Gender<span class="text-danger">*</span></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                                    <label class="form-check-label" for="others">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="batchTiming">Batch Timing<span class="text-danger">*</span></label>
                            <select class="form-control" id="batchTiming" name="batch_timing">
                                <option value="" disabled selected>Select Batch Timing</option>
                                <option value="6AM-8AM">6 A.M - 7 A.M</option>
                                <option value="7AM-8AM">7 A.M - 8 A.M</option>
                                <option value="8AM-9AM">8 A.M - 9 A.M</option>
                                <option value="5PM-6PM">5 P.M - 6 P.M</option>
                            </select>
                        </div>
                        
                        <br>
                        <div class="text-center">
                            <button type="submit" id="sales_btn" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2023 Your Company Name</p>
</footer>

</body>
</html>
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

<script>
    $(document).ready(function () {
        $("#sales_btn").click(function(){
            // alert("hello");
            $('.student_validate').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        minlength: 10
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    age: {
                        required: true
                    },
                    start_date:{
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Name must be at least 2 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter your mobile number",
                        minlength: "Mobile number must be at least 10 digits long"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    age: {
                        required: "Please enter your Age"
                    },
                    start_date: {
                        required: "Please select Start Date"
                    }
                },
                errorPlacement:function(error, element) {
                    error.insertAfter(element).css('color','red');
                }
                ,
                submitHandler: function (form) {
                    let aaaa = $( "#form_data" ).serialize();
                    $.ajax({
                        url:"registation_action.php",
                        type: "POST",
                        data: $("#form_data").serialize(),
                        success: function(data){
                            if(typeof data != 'object'){
                                data = JSON.parse(data);
                            }
                            alert("Successfully Insert into Database.");
                        }
                    });

                }
            });
        });

    });
</script>