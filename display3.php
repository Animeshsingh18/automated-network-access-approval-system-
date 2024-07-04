<?php
 include("connection.php");
 
 $query = "SELECT * FROM form3";
 $data = mysqli_query($conn, $query);
 $total = mysqli_num_rows($data);
  echo $total;
  if($total==0){
    echo "                               <h1>No Pending queries are left</h1>";
  }
 ?>
<!DOCTYPE html>
<html>
<head>
    <style>
   .header {
        margin-left: 1390px; 
            color: #007bff; 
            font-size: 16px; 
        }
        </style>
</head>
<body>
       <div class="header">
            <a href="login.php">Logout</a>
        </div>
        </body>
</html>
        
    
 <h2 align="center">Displaying the LAN Request Forms(Level 3)</h2>
 <center><table border="2" cellspacing="6" width="130%">
 <tr>
 <th width="5%">Name</th>
 <th width="5%">Designation</th>
 <th width="7%">Office Details</th>
 <th width="8%">System Inventory Holder</th>
 <th width="7%">Office Inventory Holder</th>
 <th width="3%">End Point Type with OS details (server/workstation/Desktop)</th>
 <th width="18%">End Point changed with other Network.If yes Please format the End point</th>
 <th width="8%">End point owner changed</th>
 <th width="7%">Location (Bldg.name and room no.)</th>
 <th width="5%">System MAC</th>
 <th width="9%">Required End Point Admin Rights</th>
 <th width="4%">Connection Type</th>
 <th width="35%">supervisior approval</th> 

 </tr>
 <?php
 while($result = mysqli_fetch_assoc($data)){ 
 echo "<tr>
 <td>".$result['name']."</td>
 <td>".$result['designation']."</td>
 <td>".$result['office']."</td>
 <td>".$result['sinvt']."</td>
 <td>".$result['oinvt']."</td>
 <td>".$result['endpt']."</td>
 <td>".$result['endpn']."</td>
 <td>".$result['epown']."</td>
 <td>".$result['location']."</td>
 <td>".$result['system']."</td>
 <td>".$result['rqend']."</td>
 <td>".$result['remarks']."</td>
 
 <td width='20%'><a href='display3.php?
action=approve&name=$result[name]&designation=$result[designation]&a=$result[office]&b=$result[sinvt]&c
=$result[oinvt]&d=$result[endpt]&e=$result[endpn]&f=$result[epown]&g=$result[location]&h=$result[system]&j=$result[rqend]&remarks=$result[remarks]'>Approve</a>                                  
 <a href='display3.php?action=delete&name=$result[name]&designation=$result[designation]&a=$result[office]&b=$result[sinvt]&c
=$result[oinvt]&d=$result[endpt]&e=$result[endpn]&f=$result[epown]&g=$result[location]&h=$result[system]&i=$result[rqend]&remarks=$result[remarks]'>Delete</a>
 <input type='text' id='remark' name='remark'  placeholder='add remarks'>

 </td>
 ";
 }
?>
</table>
</center>
<!-- echo $result['fname']." ".$result['lname']." ".$result['password']." ".$result["gender"]." ".
$result["phone"]." ".$result['address']."<br>"; -->
<?php
if (isset($_GET['action']) && $_GET['action'] == 'approve') {
 echo "<h1>your application is approved at level 3</h1>";

 $name=$_GET['name'];
 $dsg=$_GET['designation'];
 $of=$_GET['a'];
 $st=$_GET['b'];
 $offi=$_GET['c'];
 $endpt=$_GET['d'];
 $endptch=$_GET['e'];
 $endptow=$_GET['f'];
 $locat=$_GET['g'];
 $macadd=$_GET['h'];
 $admin=$_GET['j'];
 $remarks=$_GET['remarks'];


 
$query = "INSERT INTO form4 VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks')";
$data=mysqli_query($conn,$query);
if($data){
    echo "data inserted";
}
else{
    echo "not insered";
}
}
?>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
echo "<h1>deleted sucessfully</h1>";
$nm=$_GET['name'];
//echo " $nm";
$time =date("Y-m-d");

$name=$_GET['name'];
$dsg=$_GET['designation'];
$of=$_GET['a'];
$st=$_GET['b'];
$offi=$_GET['c'];
$endpt=$_GET['d'];
$endptch=$_GET['e'];
$endptow=$_GET['f'];
$locat=$_GET['g'];
$macadd=$_GET['h'];
$admin=$_GET['i'];
$remarks=$_GET['remarks'];

$query = "INSERT INTO history2 VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks','$time')";
$data=mysqli_query($conn,$query);
if($data){
 echo " data insertedd";
}
else{
echo "failed";
}
$sql = "SELECT password FROM user WHERE username = '$nm'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pw=$row['password'];
$query = "INSERT INTO user3 VALUES('$nm','$pw')";
$data=mysqli_query($conn,$query);

$query= "DELETE FROM form3 WHERE name='$nm' ";
$data=mysqli_query($conn,$query);

$query= "DELETE FROM form2 WHERE name='$nm' ";
$data=mysqli_query($conn,$query);

$query= "DELETE FROM form WHERE name='$nm' ";
$data=mysqli_query($conn,$query);

// $query1= "DELETE FROM user WHERE username='$nm' ";
// $data1=mysqli_query($conn,$query1);


}
?> 

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ddd;
    }
    th {
        background-color: #fe4e99;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    a {
        text-decoration: none;
        color: blue;
    }
    a:hover {
        text-decoration: underline;
    }
    input[type="text"] {
        padding: 5px;
        width: 80%;
    }
</style>