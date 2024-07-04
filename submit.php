<?php include("connection.php");
ini_set('display_errors', 0); // Disable error display
error_reporting(0); // Optionally, you can also set error_reporting to 0
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submission of LAN Connection Request Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            margin-left: 1090px; 
            color: #007bff; 
            font-size: 16px; 
        }
        h2 {
            text-align: center;
        }
        .form-links {
            text-align: center;
            margin-bottom: 10px;
        }
        .form-links a {
            margin: 0 20px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .subtitle {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            width: 60%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            vertical-align: top;
            border: 1px solid #ccc;
            width: 50%;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            resize: vertical;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .full-width {
            width: 100%;
            text-align: center;
        }
        .terms {
            margin: 20px 0;
            border: none;
            text-align: center;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color:  #5a77b7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4945b0;
        }
    </style>
</head>
<body>
<div class="header">
            <a href="login.php">Logout</a>
        </div>
    <h2>Connection Details to be filled by network admin after approval at (Level 3)</h2>
   
    <form action="#" method="POST">
        <table>
         <tr>
                <td>
                    <label for="name">Name</label>
                </td>
                <td>
                    <input type="text" id="" name="name" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="designation">Designation</label>
                </td>
                <td>
                    <input type="text" id="designation" name="designation" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="office">Office Details</label>
                </td>
                <td>
                    <input type="text" id="office" name="office" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="system">System MAC</label>
                </td>
                <td>
                    <input type="text" id="system" name="system" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="operating">Operating system</label>
                </td>
                <td>
                    <input type="text" id="operating" name="operating" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ip">IP Assigned</label>
                </td>
                <td>
                    <textarea id="ip" name="ip" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="anti">Antivirus Installed</label>
                </td>
                <td>
                    <input type="text" id="anti" name="anti" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="connect">Connect With AD server</label>
                </td>
                <td>
                    <input type="text" id="connect" name="connect" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="activate">Connection Activation Date</label>
                </td>
                <td>
                    <textarea id="activate" name="activate" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="terminate">Connection Termination Date</label>
                </td>
                <td>
                    <input type="text" id="terminate" name="terminate" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="remarks">Remarks, if any:</label>
                </td>
                <td>
                    <textarea id="remarks" name="remarks"></textarea>
                </td>
            </tr>
         
            <tr class="full-width">
                <td colspan="2">
                    <input type="submit" value="Submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
 if($_POST['submit']){
    $time =date("Y-m-d");
    echo ($time);
    $nm=$_POST['name'];
    $desg=$_POST['designation'];
    $ofc=$_POST['office'];
    $name=$_POST['system'];
    $dsg=$_POST['operating'];
    $of=$_POST['ip'];
    $st=$_POST['anti'];
    $offi=$_POST['connect'];
    $endpt=$_POST['activate'];
    $endptch=$_POST['terminate'];
    $endptow=$_POST['remarks'];
    
    echo "$nm";
    
    $query = "INSERT INTO form5 VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow')";
//  $query = "INSERT INTO form VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks')";
   $data=mysqli_query($conn,$query);
   if($data){
    echo "data inserted1";
   }
   else{
   echo "failed";
   }
   $query= "DELETE FROM form4 WHERE name='$nm' ";
   $data=mysqli_query($conn,$query);

   $query2 = "INSERT INTO history VALUES('$nm','$desg','$ofc','$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$time')";
   //  $query = "INSERT INTO form VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks')";
      $data2=mysqli_query($conn,$query2);
      if($data2){
       echo " data inserted2";
      }
      else{
      echo "failed";
      }
}
?>