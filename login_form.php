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
<html>
<head>
    <title>AgriGo Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        footer {
      /* Footer styles */
      background-color: rgb(255, 165, 0);
      text-align: center;
      padding: 20px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
      color: white;
    } 
    .header {
      background-color: rgb(255, 165, 0); /* Semi-transparent black background */
        /*      padding: 20px;*/
          text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="header" style="display: flex; color: white;">
        <h3 style="text-align: center;">WelCome to Login!</h3>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-danger text-center"><?php echo $message ?></div>
                        <form action="login_acton.php" method="post" class="login_validate" id="login_form" enctype="multipart/form-data">
                            <div class="card-header"><h3 class="text-center text-warning">Login</h3></div>
                            <div class="form-group">
                                <label for="username">Email:</label>
                                <input type="email" class="form-control" id="username" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" class="btn btn-warning btn-block" id="login_btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <footer>
    <p>&copy; 2023 Your Company Name</p>
  </footer>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize form validation on the login form
            $("#login_btn").click(function(){
                $(".login_validate").validate({
                    // Specify validation rules
                    rules: {
                        email: {
                            required: true
                        },
                        password: {
                            required: true
                        }
                    },
                    // Specify validation error messages
                    messages: {
                        email: "Please enter your Email",
                        password: "Please enter your password",
                    },
                    errorPlacement: function(error, element) {
                        error.insertAfter(element).css('color', 'red');
                    },
                    // Submit the form if it's valid
                    submitHandler: function(form) {
                        $.ajax({
                            url: "login_acton.php",
                            type: "POST",
                            data: $("#login_form").serialize(),
                            success: function(data) {
                                if (typeof data != 'object') {
                                    data = JSON.parse(data);
                                }
                                alert("Successfully logged in");
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
