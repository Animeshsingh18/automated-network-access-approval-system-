
<?php
include("connection.php");

$search_query = '';
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}
$query = "SELECT * FROM form4";
if ($search_query != '') {
    $query .= " WHERE name LIKE '%$search_query%' OR designation LIKE '%$search_query%' OR office LIKE '%$search_query%' OR sinvt LIKE '%$search_query%'";
}

$data = mysqli_query($conn, $query);
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
 <h2 align="center">Displaying the Approved LAN Request Forms</h2>

 <center>
    <form method="GET" action="">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search..." style="width: 350px; height: 35px;">
        <input type="submit" value="Search"  style="height: 36px;">
    </form>
   </center>

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
 <th width="35%">Form Submit</th> 

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
 
 <td width='20%'><a href='display4.php?
action=approve&name=$result[name]&designation=$result[designation]&a=$result[office]&b=$result[sinvt]&c
=$result[oinvt]&d=$result[endpt]&e=$result[endpn]&f=$result[epown]&g=$result[location]&h=$result[system]&i=$result[rqend]&remarks=$result[remarks]'>View</a>                                  
";
 }
?>
</table>
</center>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'approve') {
echo "button clicked";
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


 
$query = "INSERT INTO backup VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks')";
$data=mysqli_query($conn,$query);
if($data){
 echo "data inserted";
}
else{
echo "failed";
}

$query= "DELETE FROM form3 WHERE name='$name' ";
$data=mysqli_query($conn,$query);

$query= "DELETE FROM form2 WHERE name='$name' ";
$data=mysqli_query($conn,$query);

$query= "DELETE FROM form WHERE name='$name' ";
$data=mysqli_query($conn,$query);

?>
<meta http-equiv = "refresh" content = "1; url = http://localhost/demolan/submit.php"/>
<?php
 }
?>


<?php
// if (isset($_GET['action']) && $_GET['action'] == 'delete') {
// echo "<h1>deleted sucessfully</h1>";
// $nm=$_GET['name'];
// echo " $nm";
// $query= "DELETE FROM form4 WHERE name='$nm' ";
// $data=mysqli_query($conn,$query);
// }
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
        background-color:#ff823c;
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