<?php
    include('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/records.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .records-container {
            flex: 1; 
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px; 
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div class="records-container">
        <table id="records">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact</th>
                    <th>Birth Date</th>
                    <th>Birth Place</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once('../config/mysqli_connect.php');
                    $query = "SELECT * FROM cust_users";
                    $result = mysqli_query($dbc, $query);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row["id"] . '</td>';
                            echo '<td>' . $row["firstname"] . '</td>';
                            echo '<td>' . $row["lastname"] . '</td>';
                            echo '<td>' . $row["email"] . '</td>';
                            echo '<td>' . $row["username"] . '</td>';
                            echo '<td>' . $row["password"] . '</td>';
                            echo '<td>' . $row["address"] . '</td>';
                            echo '<td>' . $row["city"] . '</td>';
                            echo '<td>' . $row["contact"] . '</td>';
                            echo '<td>' . $row["birthdate"] . '</td>';
                            echo '<td>' . $row["birthplace"] . '</td>';
                            echo '<td>' . $row["age"] . '</td>';
                            echo '</tr>';
                        }
                    }
                    else {
                        echo '<tr><td colspan="11">User not found in Database!</td></tr>';
                    }
                    mysqli_close($dbc);
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // DataTables initialization
        $(document).ready(function() {
            $('#records').DataTable({
                paging: true, 
                searching: true, 
                info: true, 
                lengthChange: true, 
                pageLength: 10 
            });
        });
    </script>

    <?php
        include('../includes/footer.html');
    ?>
</body>
</html>
