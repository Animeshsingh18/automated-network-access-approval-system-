<?php
include("connection.php");

$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total == 0) {
    echo "<h1 class='no-queries'>No Pending queries are left</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAN Request Forms</title>
    <style>
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        body {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            background: rgba(71, 147, 227, 1);
            margin: 0;
            padding: 0;
            color: #333;
        }
        .header {
            text-align: right;
            padding: 20px;
            background-color: #324960;
            color: white;
        }
        .header a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .header a:hover {
            text-decoration: underline;
        }
        h1, h2 {
            text-align: center;
            margin-top: 20px;
            color: white;
            padding: 30px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .no-queries {
            text-align: center;
            color: red;
            font-size: 24px;
        }
        .table-wrapper {
            margin: 10px auto;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
            width: 90%;
        }
        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            white-space: nowrap;
            background-color: white;
        }
        .fl-table td, .fl-table th {
            text-align: center;
            padding: 5px;
        }
        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }
        .fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
            font-weight: bold;
            font-size: 14px;
        }
        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
            font-weight: bold;
            font-size: 14px;
        }
        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }
        a {
            text-decoration: none;
            color: #1e90ff;
        }
        a:hover {
            text-decoration: underline;
        }
        input[type="text"] {
            padding: 5px;
            width: 70%;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
        }
        .action-links {
            display: flex;
            justify-content: space-around;
        }
        .action-links a {
            margin-right: 10px;
        }
        .approval-message, .deletion-message {
            text-align: center;
            color: green;
            font-size: 20px;
            margin-top: 20px;
        }

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }
            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }
            .fl-table thead, .fl-table tbody, .fl-table thead th {
                display: block;
            }
            .fl-table thead th:last-child {
                border-bottom: none;
            }
            .fl-table thead {
                float: left;
            }
            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }
            .fl-table td, .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }
            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }
            .fl-table tbody tr {
                display: table-cell;
            }
            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }
            .fl-table tr:nth-child(even) {
                background: transparent;
            }
            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="login.php">Logout</a>
    </div>

    <h2>Displaying the LAN Request Forms (Level 1)</h2>
    
    <center>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Office Details</th>
                        <th>System Inventory Holder</th>
                        <th>Office Inventory Holder</th>
                        <th>End Point Type with OS details</th>
                        <th>End Point changed with other Network</th>
                        <th>End point owner changed</th>
                        <th>Location</th>
                        <th>System MAC</th>
                        <th>Required End Point Admin Rights</th>
                        <th>Connection Type</th>
                        <th>Supervisor Approval</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                        <td>{$result['name']}</td>
                        <td>{$result['designation']}</td>
                        <td>{$result['office']}</td>
                        <td>{$result['sinvt']}</td>
                        <td>{$result['oinvt']}</td>
                        <td>{$result['endpt']}</td>
                        <td>{$result['endpn']}</td>
                        <td>{$result['epown']}</td>
                        <td>{$result['location']}</td>
                        <td>{$result['system']}</td>
                        <td>{$result['rqend']}</td>
                        <td>{$result['remarks']}</td>
                        <td>
                            <div class='action-links'>
                                <a href='dispay1.php?action=approve&name={$result['name']}&designation={$result['designation']}&a={$result['office']}&b={$result['sinvt']}&c={$result['oinvt']}&d={$result['endpt']}&e={$result['endpn']}&f={$result['epown']}&g={$result['location']}&h={$result['system']}&i={$result['rqend']}&remarks={$result['remarks']}'>Approve</a>
                                <a href='dispay1.php?action=delete&name={$result['name']}&designation={$result['designation']}&a={$result['office']}&b={$result['sinvt']}&c={$result['oinvt']}&d={$result['endpt']}&e={$result['endpn']}&f={$result['epown']}&g={$result['location']}&h={$result['system']}&i={$result['rqend']}&remarks={$result['remarks']}'>Delete</a>
                            </div>
                            <input type='text' id='remark' name='remark' placeholder='Add remarks'>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </center>
    
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'approve') {
        echo "<h1 class='approval-message'>Your application is approved at level 1</h1>";

        $name = $_GET['name'];
        $dsg = $_GET['designation'];
        $of = $_GET['a'];
        $st = $_GET['b'];
        $offi = $_GET['c'];
        $endpt = $_GET['d'];
        $endptch = $_GET['e'];
        $endptow = $_GET['f'];
        $locat = $_GET['g'];
        $macadd = $_GET['h'];
        $admin = $_GET['i'];
        $remarks = $_GET['remarks'];

        $query = "INSERT INTO form2 VALUES('$name', '$dsg', '$of', '$st', '$offi', '$endpt', '$endptch', '$endptow', '$locat', '$macadd', '$admin', '$remarks')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<p>Data inserted successfully.</p>";
        } else {
            echo "<p>Failed to insert data.</p>";
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        echo "<h1 class='deletion-message'>Deleted successfully</h1>";

        $nm = $_GET['name'];
        $time = date("Y-m-d");

        $name = $_GET['name'];
        $dsg = $_GET['designation'];
        $of = $_GET['a'];
        $st = $_GET['b'];
        $offi = $_GET['c'];
        $endpt = $_GET['d'];
        $endptch = $_GET['e'];
        $endptow = $_GET['f'];
        $locat = $_GET['g'];
        $macadd = $_GET['h'];
        $admin = $_GET['i'];
        $remarks = $_GET['remarks'];

        $query = "INSERT INTO history2 VALUES('$name', '$dsg', '$of', '$st', '$offi', '$endpt', '$endptch', '$endptow', '$locat', '$macadd', '$admin', '$remarks', '$time')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<p>Data inserted into history successfully.</p>";
        } else {
            echo "<p>Failed to insert data into history.</p>";
        }

        $sql = "SELECT password FROM user WHERE username = '$nm'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $pw = $row['password'];

        $query = "INSERT INTO user1 VALUES('$nm', '$pw')";
        $data = mysqli_query($conn, $query);

        $query = "DELETE FROM form WHERE name='$nm'";
        $data = mysqli_query($conn, $query);
    }
    ?>
</body>
</html>
