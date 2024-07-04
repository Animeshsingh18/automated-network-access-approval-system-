<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login Form</title>
 <style>
 body {
 display: flex;
 justify-content: center;
 align-items: center;
 height: 100vh;
 background-color: #f0f0f0;
 font-family: Arial, sans-serif;
 margin: 0;
 }
 .center {
 background-color: #fff;
 padding: 40px;
 border-radius: 10px;
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 text-align: center;
 }
 .center h1 {
 margin-bottom: 20px;
 font-size: 24px;
 color: #333;
 }
 .form {
 display: flex;
 flex-direction: column;
 }
 .textfiled {
 padding: 10px;
 margin: 10px 0;
 width: 100%;
 border: 1px solid #ccc;
 border-radius: 5px;
 }
 .btn {
 padding: 10px;
 margin: 20px 0;
 width: 100%;
 background-color: #007BFF;
 border: none;
 border-radius: 5px;
 color: #fff;
 font-size: 16px;
 cursor: pointer;
 }
 .btn:hover {
 background-color: #0056b3;
 }
 .signup {
 margin-top: 20px;
 font-size: 14px;
 color: #333;
 }
 .link {
 color: #007BFF;
 text-decoration: none;
 }
 .link:hover {
 text-decoration: underline;
 }
 </style>
</head>
<body>
 <div class="center">
 <h1>Login</h1>
 <form action="#" method="POST" autocomplete="off">
 <div class="form">
 <input type="text" name="username" class="textfiled" placeholder="Username" pattern="[A-Za-z\s]+" title="Please enter letters only" oninvalid="showErrorMessage()" required>
 <input type="password" name="password" class="textfiled" placeholder="Password">
 <input type="submit" name="login" value="Login" class="btn">
 <div class="signup">New User <a href="user.php" class="link">Register Here</a></div>
 </div>
 </form>
 </div>
 <script>
    function showErrorMessage() {
      var errorMessage = "Please enter letters only in username";
      alert(errorMessage);
    }
  </script>

</body>
</html>
<?php
 include("connection.php");
 ini_set('display_errors', 0); // Disable error display
error_reporting(0); // Optionally, you can also set error_reporting to 0
error_reporting(E_ERROR | E_PARSE);
 if(isset($_POST['login'])){
 $username=$_POST['username'];
 $pwd=$_POST['password'];
 $username=stripcslashes($username);
 $pwd=stripcslashes($pwd);
 $username=htmlspecialchars($username);
 $pwd=htmlspecialchars($pwd);

 $query= "SELECT * FROM level1 WHERE authority='$username' && password='$pwd' ";
 $data=mysqli_query($conn,$query);
 echo $total;
 $total=mysqli_num_rows($data);
 if($total){
 
 ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/dispay1.php"/>
 <?php
 }
 $query1="SELECT * FROM level2 WHERE authority='$username' && password='$pwd' ";
 $data1=mysqli_query($conn,$query1);
 $total1=mysqli_num_rows($data1);

 if($total1){

 ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/display2.php"/>
 <?php
 }
 $query2="SELECT * FROM level3 WHERE authority='$username' && password='$pwd' ";
 $data2=mysqli_query($conn,$query2);
 $total2=mysqli_num_rows($data2);
 if($total2){
 
 ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/display3.php"/>
 <?php
 }
 $query3="SELECT * FROM user WHERE username='$username' && password='$pwd' ";
 $data3=mysqli_query($conn,$query3);
 $total2=mysqli_num_rows($data3);
 
 session_name("session1");
 session_start();
 $_SESSION["us"]=$username;
 if($total2){
 
 ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/dashboaed.php?use=$username"/>
 <?php
 }
 $query2="SELECT * FROM admin WHERE usename='$username' && password='$pwd' ";
 $data2=mysqli_query($conn,$query2);
 $total2=mysqli_num_rows($data2);
 if($total2){
 
 ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/display4.php"/>
 <?php
 }
 $query1="SELECT * FROM checkhistory WHERE authority='$username' && password='$pwd' ";
 $data1=mysqli_query($conn,$query1);
 $total1=mysqli_num_rows($data1);

 if($total1){

 ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/history.php"/>
 <?php
 }

 } 
 ?>