
<?php include("connection.php");
 session_name("session1");
 session_start();
 $abc= $_SESSION["us"];
 
 $query1="SELECT * FROM history WHERE name='$abc'";
 $data1=mysqli_query($conn,$query1);
 $total1=mysqli_num_rows($data1);
 echo $total1;
 if($total1){
   $a="<h2>Your application has approved at all levels</h2>";
 }
  $query1="SELECT * FROM form4 WHERE name='$abc'";
  $data1=mysqli_query($conn,$query1);
  $total1=mysqli_num_rows($data1);
  echo $total1;
  if($total1){
    $a="<h2>Your application is approved at level 3</h2>";
  }
  $query2="SELECT * FROM form3 WHERE name='$abc'";
  $data2=mysqli_query($conn,$query2);
  $total2=mysqli_num_rows($data2);
  echo $total2;
  if($total1==0 && $total2!=0){
    $a="<h2>Your application is approved at level 2</h2>";
  }

  $query3="SELECT * FROM form2 WHERE name='$abc'";
  $data3=mysqli_query($conn,$query3);
  $total3=mysqli_num_rows($data3);
  echo $total3;
  if($total1==0 && $total2==0 && $total3!=0){
    $a="<h2>Your application is approved at level 1</h2>";
  }

  $query4="SELECT * FROM form WHERE name='$abc'";
  $data4=mysqli_query($conn,$query4);
  $total4=mysqli_num_rows($data4);
  echo $total4;
  if($total1==0 && $total2==0 && $total3==0 && $total4!=0){
    $a="<h2>Your application is under processing</h2>";
  }

  $query5="SELECT * FROM user1 WHERE username='$abc'";
  $data5=mysqli_query($conn,$query5);
  $total5=mysqli_num_rows($data5);
  echo $total5;
  if($total5!=0){
    $a="<h2>Your application is Rejected at level 1</h2>";
  }

  $query4="SELECT * FROM user2 WHERE username='$abc'";
  $data4=mysqli_query($conn,$query4);
  $total6=mysqli_num_rows($data4);
  echo $total6;
  if($total6!=0){
    $a="<h2>Your application is Rejected at level 2</h2>";
  }

  $query4="SELECT * FROM user3 WHERE username='$abc'";
  $data4=mysqli_query($conn,$query4);
  $total7=mysqli_num_rows($data4);
  echo $total7;
  if($total7!=0){
    $a="<h2>Your application is Rejected at level 3</h2>";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .status {
            display: flex;
            justify-content: space-between;
            padding: 20px 0;
            border-bottom: 2px solid #eee;
        }
        .status div {
            text-align: center;
            flex: 1;
        }
        .status div:last-child {
            border-right: none;
        }
        .status h2 {
            margin: 0;
            font-size: 20px;
            color: #666;
        }
        .status p {
            margin: 5px 0 0;
            font-size: 18px;
            color: #333;
        }
        .actions {
            padding-top: 20px;
            text-align: center;
        }
      
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color:  #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:  #0056b3;
        }

    </style>
</head>
<body>
    <div class="dashboard">
        <div class="header">
            <h1>Welcome, <?php echo ($abc);?> </h1>
            <a href="login.php">Logout</a>
        </div>
        <div class="status">
            <div>
                <h1>Application Status</h1>
                <p><?php echo ($a);?></p>
            </div>
          
        </div>
        <div class="actions">
        <form method="post" action="">  
        <input type="submit" value="View Details" name="submit">
        </form>
        </div>
    </div>
</body>
</html>

<?php
 if(isset($_POST['submit'])){

  ?>
 <meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/view.php"/>
 <?php
 }
 ?>