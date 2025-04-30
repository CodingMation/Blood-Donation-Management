<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You</title>
  <style>
    body {
      background: #f8fafc;
      font-family: 'Roboto', sans-serif;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    h1 {
      color: #10b981;
      font-size: 3rem;
    }
    p {
      color: #64748b;
      font-size: 1.2rem;
      margin-top: 10px;
    }
    .button {
      margin-top: 20px;
      padding: 10px 20px;
      background: #3b82f6;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
      text-decoration: none;
    }
    .button:hover {
      background: #2563eb;
    }
  </style>
</head>
<body>
  <?php if(isset($_SESSION['donor_name'])){ ?>
    <h1>Thank You! <?php echo $_SESSION['donor_name'] ?></h1>
    <p>Your form was submitted successfully. 🙌</p>
    <a href="./design.html" class="button">Go to Home</a>
  <?php }else if(isset($_SESSION['donor_name_exist'])){ ?>
  <h1>Thanks! <?php echo $_SESSION['donor_name_exist'] ?></h1>
  <p>But You Already Exist!</p>
  <a href="./design.html" class="button">Go to Home</a>
  <?php }else{
    echo "<h1 style='color:red;'>You're Not A Donor</h1>";
    echo "<a href='./design.html' class='button'>Go to Home</a>";
  } ?>
  
</body>
</html>