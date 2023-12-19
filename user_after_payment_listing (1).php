<?php
        
        include 'database.php';
        session_start();
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding-top: 56px; /* Adjusted for fixed navbar */
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .content {
            margin-left: 250px; /* Adjusted for sidebar width */
            padding: 20px;
        }
    </style>
    <title>Left Navigation Landing Page</title>
</head>
<body>

<!-- Navigation Sidebar -->
<div class="sidebar">
    <nav class="nav flex-column">
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link" href="https://yogaapplication.000webhostapp.com/user_after_payment_listing.php">Your Details</a>
        <a class="nav-link" href="https://yogaapplication.000webhostapp.com/edit_batch_form.php">Edit Batch Timing</a>
        <a class="nav-link" href="https://yogaapplication.000webhostapp.com/login_form.php">Logout</a>
    </nav>
</div>
<table class=" w-75 m-auto table table-striped">
     <thead>
        <tr>
         <th>S.No</th>
         <th>Name</th>
         <th>Email</th>
         <th>Mobile</th>
         <th>Age</th>
         <th>Time Period</th>
        </tr>
    </thead>
    <tbody>  
        <?php
        
       // print_r($_SESSION);exit;
            $email = $_SESSION['user_data']['user_email'];

            $stmt = $conn->prepare("SELECT * FROM user_table WHERE vEmail = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // print_r($result);exit();
            if(is_array($result) && count($result)>0){
               foreach($result as $key=>$value){ ?>
                    <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['vName']; ?></td>
                    <td><?php echo  $value['vEmail']; ?></td>
                    <td><?php echo  $value['vMobile']; ?></td>
                    <td><?php echo  $value['iAge']; ?></td>
                    <td><?php echo  $value['dtAddedDate']; ?></td>
                    
                    </tr>
              
          <?php }
            }else{ ?>
                <tr><td colspan="5"><div class="text-center text-danger">No user data found.</div></td></tr>
      <?php } ?>
    </tbody>
</table>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
