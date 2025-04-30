<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'
    &&isset($_POST['donate'])
  )
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $bloodType = $_POST['bloodType'];
    $phone = $_POST['phone'];

   if(!isDonorExist($conn, $email)){
    $sql = "INSERT INTO donors (`name`, `email`, `blood_type`, `phone`) 
    VALUES ('$name', '$email', '$bloodType', '$phone')";
    $result = mysqli_query($conn, $sql);
    addDonor($result, $name);
    }else if(isDonorExist($conn, $email)){
    $_SESSION['donor_name_exist'] = $name;
    header("Location: ./thankyou.php");
    exit();
   }else{
    echo 'Due to some err Form not filled!';
    sleep(2);
    header("Location: ./design.html");
   }

   
}

function isDonorExist($conn, $email){
    $donor_sql = "SELECT * FROM donors WHERE email = '$email'";
    $donor_exist_result = mysqli_query($conn, $donor_sql);
    return mysqli_num_rows($donor_exist_result);
}

function addDonor($result, $name){
    if($result){
        $_SESSION['donor_name'] = $name;
        header("Location: ./thankyou.php");
        exit();
    }
    else{
        echo "Error: something wrong!";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Management</title>
    <link rel="stylesheet" href="./pStyles.css">
</head>
<body>
    <div class="container">
        <h1>Blood Donation Management</h1>
        <form action="" onsubmit="handleform()" method="POST">
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="text" name="bloodType" id="bloodType" placeholder="Blood Type (e.g., A+, O-)" required>
            <input type="text" name="phone" id="phone" placeholder="Phone" required>
            <button type="submit" name="donate">Donate Blood</button>
        </form>
    </div>
<script>
window.onload = () => {
if (performance.navigation.type === 2) {
    // Page was accessed by back/forward navigation
    document.querySelector('form').reset();
}
};
</script>

</body>
</html>