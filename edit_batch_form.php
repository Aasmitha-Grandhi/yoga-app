<?php
$postData = $_POST;
session_start();
 // echo "<pre>";
 // print_r();exit;
$user_data = $_SESSION['user_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Add custom styles here */
        .payment-header {
            background-color: #007bff; /* You can change this color to your desired one */
            color: #fff; /* Text color on the header */
            padding: 15px;
            text-align: center;
        }
        #creditCard {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
    </style>

    <title>Payment Page</title>
</head>
<body>

<!-- Payment Form Section -->
<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <!-- Payment Details Header -->
                    <div class="payment-header">
                        <h2>Payment Details</h2>
                    </div>
                    
                    
                    <form action="batch_action_timing.php" method="post" id="form_batch_timing" class="batch_validate" enctype="multipart/form-data">

                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="fullName">Full Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" readonly value="<?php if(isset($user_data['user_name'])){echo $user_data['user_name'];}?>">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" readonly value="<?php if(isset($user_data['user_email'])){echo $user_data['user_email'];}?>">
                        </div>

                        <!-- Accepted Cards with Logo -->
                        <!--<div class="form-group">-->
                        <!--    <label for="acceptedCards">Accepted Cards</label>-->
                        <!--    <div id="acceptedCards" class="text-center">-->
                                <!-- Include card logos here -->
                        <!--       t="Visa Logo" style="width: 149px; margin-right: 330px;">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div>
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
                            
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" id="pay_ment_edit" class="btn btn-primary btn-lg btn-block">Pay 500 Now</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

</body>
</html>

<script>
    $(document).ready(function() {
        $('#creditCard').on('input', function() {
            // Get the input value
            var cardNumber = $(this).val();
            var cleanedCardNumber = cardNumber.replace(/\D/g, '');
            var formattedCardNumber = cleanedCardNumber.match(/.{1,4}/g);
            if (formattedCardNumber) {
                formattedCardNumber = formattedCardNumber.join(' ');
            }
            $(this).val(formattedCardNumber);

            // You can add additional logic for card validation or styling here
        });
   
        $("#pay_ment_edit").click(function(){
            // alert("hello");
            $('.batch_validate').validate({
                rules: {
                    fullName: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    creditCard: {
                        required: true,
                        minlength: 14
                    },
                    expMonth: {
                        required: true,
                        range: [0, 12] 
                    },
                    expYear: {
                        required: true
                    }
                },
                messages: {
                    fullName: {
                        required: "Please enter your name",
                        minlength: "Name must be at least 2 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    expMonth: {
                        required: "Please enter your Expiration Month",
                        range:"Please enter 1 to 12 Months"
                    },
                    expYear: {
                        required: "Please enter your Expiration Year"
                    }
                },
                errorPlacement:function(error, element) {
                    error.insertAfter(element).css('color','red');
                }
                ,
                submitHandler: function (form) {
                    let aaaa = $( "#form_batch_timing" ).serialize();
                    $.ajax({
                        url:"batch_action_timing.php",
                        type: "POST",
                        data: $("#form_batch_timing").serialize(),
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