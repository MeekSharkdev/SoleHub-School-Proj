<?php
session_start();
include('../config/mysqli_connect.php');

// Check if the admin is logged in (optional, remove if not needed)


// Fetch users from the database
$sql = "SELECT id, first_name, last_name, phone, birthdate, email, created_at FROM cust_users";

$result =  mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header Styling */
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #0056b3;
        }

        /* Table Styling */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0056b3;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Links and Buttons */
        a {
            text-decoration: none;
            color: #0056b3;
            font-weight: bold;
        }

        a:hover {
            color: #003d80;
        }

        button {
            padding: 10px 15px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #003d80;
        }

        /* Add spacing to actions */
        .actions {
            display: flex;
            justify-content: space-between;
            width: 90%;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Manage Users</h1>
    <div class="actions">
        <a href="register.php">Register New User</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Birthdate</th>
                <th>Email Address</th>
                <th>Registration Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['first_name']); ?></td>
                        <td><?= htmlspecialchars($row['last_name']); ?></td>
                        <td><?= htmlspecialchars($row['phone']); ?></td>
                        <td><?= htmlspecialchars($row['birthdate']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['created_at']); ?></td>
                        <td>
                            <a href="edit_user.php?id=<?= $row['id']; ?>">Edit</a> |
                            <a href="delete_user.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
