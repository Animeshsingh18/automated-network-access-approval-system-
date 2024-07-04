<?php include("connection.php");
ini_set('display_errors', 0); // Disable error display
error_reporting(0); // Optionally, you can also set error_reporting to 0
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="user.php" method="post">
        <h2>Register</h2>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" pattern="[A-Za-z\s]+" title="Please enter letters only" oninvalid="showErrorMessage()" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <input type="submit" value="Register" name="register">
        <?php if (isset($error)) { echo '<div class="error">'.$error.'</div>'; } ?>
    </form>
    <script>
    function showErrorMessage() {
      var errorMessage = "Please enter letters only in username";
      alert(errorMessage);
    }
  </script>

</body>
</html>

<?php
 if($_POST['register']){
 //echo "hello user";


 $username = $_POST['username'];
 $password = $_POST['password'];
 $confirm_password = $_POST['confirm_password'];
 $username=stripcslashes($username);
 $password=stripcslashes($password);
 $confirm_password=stripcslashes($confirm_password);
 $username=htmlspecialchars($username);
 $password=htmlspecialchars($password);
 $confirm_password=htmlspecialchars($confirm_password);


 // Basic validation
 if (empty($username) || empty($password) || empty($confirm_password)) {
     $error = "All fields are required.";
 } elseif ($password !== $confirm_password) {

    echo "<script>alert('Password does not match');</script>";
 } 
   
else{

    $query = "INSERT INTO user (username,password) VALUES('$username','$password')";
    $data=mysqli_query($conn,$query);
   if($data){
    echo "data inserted";
   }
   else{
   echo "failed";
   
   }
    ?>

    <meta http-equiv = "refresh" content = "0; url = http://localhost/demolan/rqform.php"user=$username/>
    <?php
}
}
?>