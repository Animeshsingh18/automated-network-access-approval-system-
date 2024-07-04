<?php include("connection.php");
 
 session_name("session1");
 session_start();
 $abc= $_SESSION["us"];

 $abc = $conn->real_escape_string($abc);
 //$sql = "SELECT designation, office,sinvt,oinvt,endpt,endpn,epown,location,system,rqend,remarks FROM form WHERE name = '$abc'";
 $sql = "SELECT * FROM form where name='$abc'";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the results
   echo ($result->num_rows);
    echo "from form";
    while ($row = $result->fetch_assoc()) {
    $a= $row["designation"];
    $b= $row["office"];
    $c= $row["sinvt"];
    $d= $row["oinvt"];
    $e= $row["endpt"];
    $f= $row["endpn"];
    $g= $row["epown"];
    $h= $row["location"];
    $i= $row["system"];
    $j= $row["rqend"];
    $k= $row["remarks"];
    }
}
$sql = "SELECT * FROM history2 where name='$abc'";
$result = $conn->query($sql);
//  else if($result->num_rows==0){
//     // $sql = "SELECT * FROM history2 where name='$abc'"; 
//     $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch the results
        echo "from history2";
        while ($row = $result->fetch_assoc()) {
        $a= $row["designation"];
        $b= $row["office"];
        $c= $row["sinvt"];
        $d= $row["oinvt"];
        $e= $row["endpt"];
        $f= $row["endpn"];
        $g= $row["epown"];
        $h= $row["location"];
        $i= $row["system"];
        $j= $row["rqend"];
        $k= $row["remarks"];
        }
}

else{
    $sql = "SELECT * FROM backup where name='$abc'"; 
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch the results
        echo "from backup";
        while ($row = $result->fetch_assoc()) {
        $a= $row["designation"];
        $b= $row["office"];
        $c= $row["sinvt"];
        $d= $row["oinvt"];
        $e= $row["endpt"];
        $f= $row["endpn"];
        $g= $row["epown"];
        $h= $row["location"];
        $i= $row["system"];
        $j= $row["rqend"];
        $k= $row["remarks"];
        }
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>LAN Connection Request Form</title>
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
        
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
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
            background-color: #4CAD50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
       <div class="header">
            <a href="login.php">Logout</a>
        </div>
    
    <h2>LAN Connection Request Form</h2>
    <div class="form-links">
        <a href="#">Internet Form</a>
        <a href="#">DMZ Form</a>
        <a href="#">LAN Form</a>
    </div>
   
    <div class="subtitle">
        <p>(To be filled by user)</p>
    </div>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>
                    <label for="name">Name:</label>
                </td>
                <td>
                    <input type="text" id="name" name="name" value="<?php echo ($abc);?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="designation">Designation:</label>
                </td>
                <td>
                    <input type="text" id="designation" name="designation" value="<?php echo ($a);?>"required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="officedt">Office Details:</label>
                </td>
                <td>
                    <input type="text" id="officedt" name="a" value="<?php echo ($b);?>"  required></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="stinvent">System Inventory Holder:</label>
                </td>
                <td>
                    <input type="text" id="stinvent" name="b" value="<?php echo ($c);?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="offinvent">Office Inventory Number:</label>
                </td>
                <td>
                    <input type="text" id="offinvent" name="c" value="<?php echo ($d);?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="endpt">End Point Type with OS details (Server/Workstation/Desktop/Laptop):</label>
                </td>
                <td>
                    <input type="text" id="endpt" name="d" value="<?php echo ($e);?>" required></input>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="endptch">End point changed with other network (If yes, please format the end point - Low Level formatted):</label>
                </td>
                <td>
                    <input type="text" id="endptch" name="e" value="<?php echo ($f);?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="endptow">End Point owner changed:</label>
                </td>
                <td>
                    <input type="text" id="endptow" name="f" value="<?php echo ($g);?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="location">Location (Bldg. name and room no):</label>
                </td>
                <td>
                    <input type="text" id="location" name="g" value="<?php echo ($h);?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="macadd">System MAC:</label>
                </td>
                <td>
                    <input type="text" id="macadd" name="h" value="<?php echo ($i);?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="admin">Required End Point Admin Rights:</label>
                </td>
                <td>
                    <input type="text" id="admin" name="i" value="<?php echo ($j);?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="remarks">Connection Type(Temporary/Permanent)</label>
                </td>
                <td>
                    <input type="text" id="remarks" name="remarks" value="<?php echo ($k);?>"></input>
                </td>
            </tr>          
        </table>
    </form>
</body>
</html>
