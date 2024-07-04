<?php include("connection.php");
ini_set('display_errors', 0); // Disable error display
error_reporting(0); // Optionally, you can also set error_reporting to 0
error_reporting(E_ERROR | E_PARSE);
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
                    <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" title="Please enter letters only" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="designation">Designation:</label>
                </td>
                <td>
                    <input type="text" id="designation" name="designation" pattern="[A-Za-z0-9\s\(\)-]+" title="Please enter letters, numbers, (), and - only"required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="officedt">Office Details:</label>
                </td>
                <td>
                    <textarea id="officedt" name="a" pattern="[A-Za-z0-9\s\(\)-]+" title="Please enter letters, numbers, (), and - only" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="stinvent">System Inventory Holder:</label>
                </td>
                <td>
                    <input type="text" id="stinvent" name="b" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="offinvent">Office Inventory Number:</label>
                </td>
                <td>
                    <input type="text" id="offinvent" name="c" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="endpt">End Point Type with OS details (Server/Workstation/Desktop/Laptop):</label>
                </td>
                <td>
                    <textarea id="endpt" name="d" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="endptch">End point changed with other network (If yes, please format the end point - Low Level formatted):</label>
                </td>
                <td>
                    <input type="text" id="endptch" name="e" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="endptow">End Point owner changed:</label>
                </td>
                <td>
                    <input type="text" id="endptow" name="f" pattern="[A-Za-z\s]+" title="Please enter letters only">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="location">Location (Bldg. name and room no):</label>
                </td>
                <td>
                    <input type="text" id="location" name="g" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="macadd">System MAC:</label>
                </td>
                <td>
                <input type="text" id="macadd" name="h" pattern="^\d*\.?\d+$" title="Only numbers and '.' are allowed" required>

                    <!-- <input type="text" id="macadd" name="h" pattern="^\d*\.?\d+$" title="only numbers and '.' is allowed "required> -->
                </td>
            </tr>
            <tr>
                <td>
                    <label for="admin">Required End Point Admin Rights:</label>
                </td>
                <td>
                    <input type="text" id="admin" name="i" pattern="[A-Za-z\s]+" title="Please enter letters only">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="remarks">Connection Type (Temporary/Permanent)</label>
                </td>
                <td>
                    <textarea id="remarks" name="remarks" pattern="[A-Za-z\s]+" title="Please enter letters only"></textarea>
                </td>
            </tr>
            <tr class="terms">
                <td colspan="2">
                    <label for="terms_conditions">Terms & Conditions</label>
                    <input type="checkbox" id="terms_conditions" name="terms_conditions" required>
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

    echo "<script>alert('Aplication submitted');</script>";
    $name=$_POST['name'];
    $dsg=$_POST['designation'];
    $of=$_POST['a'];
    $st=$_POST['b'];
    $offi=$_POST['c'];
    $endpt=$_POST['d'];
    $endptch=$_POST['e'];
    $endptow=$_POST['f'];
    $locat=$_POST['g'];
    $macadd=$_POST['h'];
    $admin=$_POST['i'];
    $remarks=$_POST['remarks'];

    $name=htmlspecialchars($name);
    $dsg=htmlspecialchars($dsg);
    $of=htmlspecialchars($of);
    $st=htmlspecialchars($st);
    $offi=htmlspecialchars($offi);
    $endpt=htmlspecialchars($endpt);
    $endptch=htmlspecialchars($endptch);
    $endptow=htmlspecialchars($endptow);
    $locat=htmlspecialchars($locat);
    $macadd=htmlspecialchars($macadd);
    $admin=htmlspecialchars($admin);
    $remarks=htmlspecialchars($remarks);
    echo "$name";


    $query = "INSERT INTO form (name,designation,office,sinvt,oinvt,endpt,endpn,epown,location,system,rqend,remarks)VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks')";
//  $query = "INSERT INTO form VALUES('$name','$dsg','$of','$st','$offi','$endpt','$endptch','$endptow','$locat','$macadd','$admin','$remarks')";
   $data=mysqli_query($conn,$query);
   if($data){
    echo "data inserted";
   }
   else{
   echo "failed";
   }
}
?>