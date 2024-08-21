<?php
@include 'config.php';

session_start();
if(isset($_SESSION['name'])){
    header('location:dashboard.php');
}

if(isset($_POST['mobile']) && $_POST['password']){
    $mobile = $_POST['mobile'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM owner WHERE id = '$mobile' && password='$pass'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result)>0){

        $_SESSION['name'] = $row['name'];
        $_SESSION['mobile'] = $row['id'];

        header('location:dashboard.php');   
    }else{
        $msg = 'Invalid Credentials.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cstyles.css">
    <style>
   
    </style>
    <title>Login to Room Finder</title>
</head>
<body>
    <div class="outer">
        <h1 class="app-name" style="margin-top: 30px;"><span>R</span>oom <Span>F</Span>inder</h1>
        <div class="tag-line">A Room Finding application for Bachelors</div>
        
        <form action="" method="post" class="shadow login-form">
            <div class="form-banner">Login to Room Finder</div>
            <?php 
                if(isset($msg)){
                    echo '<span class="error text-box">'.$msg.'</span>';
                }
            ?>
            
            <input type="tel" pattern="[0-9]{10}" class="text-box" required name="mobile" id="mobile" placeholder="Mobile Number"><br>
            <input type="password" class="text-box" required name="password" id="password" placeholder="Password"><br/>
            <!-- <textarea name="address" id="address" cols="30" rows="5" placeholder="Address" class="text-box"></textarea> -->
            
            <input type="submit" value="Login" class="form-btn"><br>
            <div class="form-links">
                <span><a href="register.html">Don't have an account? Register</a></span>
            </div>

        </form>

    </div>
</body>
</html>