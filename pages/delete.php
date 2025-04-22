<?php
session_start();
include('../includes/header.php');
require('../config/mysqli_connect.php');

$notification = "";

// Handle deletion request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Validate the ID (though it should be numeric due to hidden field)
    if (!is_numeric($id)) {
        echo "Invalid ID";
        exit;
    }

    // Delete user from database
    $sql_delete = "DELETE FROM cust_users WHERE id = ?";
    $stmt = $dbc->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Notify success
        $notification = '<div class="alert alert-success" role="alert">User deleted successfully.</div>';
    } else {
        // Notify error
        $notification = '<div class="alert alert-danger" role="alert">Error deleting user: ' . $dbc->error . '</div>';
    }

    // Close prepared statement
    $stmt->close();
}

// Handle auto-increment reset request
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    $sql_reset = "ALTER TABLE cust_users AUTO_INCREMENT = 1";
    if ($dbc->query($sql_reset) === TRUE) {
        $notification = '<div class="alert alert-success" role="alert">Auto-increment ID reset successfully.</div>';
    } else {
        $notification = '<div class="alert alert-danger" role="alert">Error resetting auto-increment ID: ' . $dbc->error . '</div>';
    }
}

// Fetch users from the database
$sql = "SELECT id, firstname, lastname, email, username, password, address, city, contact, birthdate, birthplace, age FROM cust_users";
$result = $dbc->query($sql);

if (!$result) {
    die("Error executing query: " . $dbc->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/delete.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        .reset-button {
            position: absolute;
            margin-top: -50px;
        }

        .table-container {
            position: relative;
            margin-top: 50px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>List of Users Data</h3>
        <?php echo $notification; ?>
        <div class="table-container">
            <a href="?reset=true" class="btn btn-primary reset-button">Reset ID</a>
            <div id="table">
                <table id="userTable" class="table table-hover">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td><?php echo htmlspecialchars($row['password']); ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td><?php echo htmlspecialchars($row['city']); ?></td>
                                <td><?php echo htmlspecialchars($row['contact']); ?></td>
                                <td><?php echo htmlspecialchars($row['birthdate']); ?></td>
                                <td><?php echo htmlspecialchars($row['birthplace']); ?></td>
                                <td><?php echo htmlspecialchars($row['age']); ?></td>
                                <td>
                                    <form id="deleteForm_<?php echo $row['id']; ?>" method="post" action="delete.php">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                        <button type="button" onclick="confirmDelete(<?php echo $row['id']; ?>)" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include('../includes/footer.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                paging: false,
                searching: false,
                info: false,
                ordering: false
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure you want to delete this user?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm_' + id).submit();
                }
            });
        }
    </script>
</body>
</html>
