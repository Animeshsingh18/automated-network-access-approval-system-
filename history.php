<?php
include("connection.php");

$search_query = '';
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}
$query = "SELECT * FROM history";
if ($search_query != '') {
    $query = " WHERE system LIKE '%$search_query%' OR operating LIKE '%$search_query%' OR ip LIKE '%$search_query%' OR date LIKE '%$search_query%'";
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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color:#007BFF;
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
        .pad {
            text-align: center;
            padding-top: 70px; /* Adjust the value as needed */
        }
        .second-table th {
            background-color: #EE4B2B; /* Change this to the desired color */
        }
        .second-table tr:nth-child(even) {
            background-color: #e6ffe6; /* Change this to the desired color */
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="login.php">Logout</a>
    </div>

    <h2 align="center">List of Forms Approved</h2>

    <center>
        <form method="GET" action="">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search by date, ip, system, OP system..." style="width: 350px; height: 35px;">
            <input type="submit" value="Search"  style="height: 36px;">
        </form>
    </center>

    <center>
        <table border="2" cellspacing="6" width="55%">
            <tr>
                <th width="5%">System Mac</th>
                <th width="5%">Operating System</th>
                <th width="7%">IP Assigned</th>
                <th width="8%">Antivirus Installed</th>
                <th width="7%">Connect with AD server</th>
                <th width="8%">Connection Activation Date</th>
                <th width="7%">Connection Termination Date</th>
                <th width="4%">Remarks,if any</th>
                <th width="4%">Date</th>
            </tr>
            <?php
            while($result = mysqli_fetch_assoc($data)){ 
                echo "<tr>
                    <td>".$result['system']."</td>
                    <td>".$result['operating']."</td>
                    <td>".$result['ip']."</td>
                    <td>".$result['anti']."</td>
                    <td>".$result['connect']."</td>
                    <td>".$result['active']."</td>
                    <td>".$result['terminate']."</td>
                    <td>".$result['remark']."</td>
                    <td>".$result['date']."</td>
                </tr>";
            }
            ?>
        </table>
    </center>

    <?php
    include("connection.php");

    $search_query = '';
    if (isset($_GET['search'])) {
        $search_query = $_GET['search'];
    }
    $query1 = "SELECT * FROM history2";
    if ($search_query != '') {
        $query1 .= " WHERE name LIKE '%$search_query%' OR designation LIKE '%$search_query%' OR office LIKE '%$search_query%' OR date LIKE '%$search_query%'";
    }

    $data1 = mysqli_query($conn, $query1);

    ?>

    <h2 align="center" class="pad">List of Forms Rejected</h2>

    <center>
        <form method="GET" action="">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search by date, name, designation, office details..." style="width: 350px; height: 35px;">
            <input type="submit" value="Search"  style="height: 36px;">
        </form>
    </center>

    <center>
        <table class="second-table" border="2" cellspacing="6" width="55%">
            <tr>
                <th width="5%">Name</th>
                <th width="5%">Designation</th>
                <th width="7%">Office Details</th>
                <th width="8%">System Inventory Holder</th>
                <th width="7%">End Point Type with OS details (server/workstation/Desktop)</th>
                <th width="8%">Location</th>
                <th width="7%">System MAC</th>
                <th width="4%">Connection Type</th>
                <th width="4%">Date</th>
            </tr>
            <?php
            while($result = mysqli_fetch_assoc($data1)){ 
                echo "<tr>
                    <td>".$result['name']."</td>
                    <td>".$result['designation']."</td>
                    <td>".$result['office']."</td>
                    <td>".$result['sinvt']."</td>
                    <td>".$result['endpt']."</td>
                    <td>".$result['location']."</td>
                    <td>".$result['system']."</td>
                    <td>".$result['remarks']."</td>
                    <td>".$result['date']."</td>
                </tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
