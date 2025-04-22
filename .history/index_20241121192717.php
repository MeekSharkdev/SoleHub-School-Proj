<?php
include('../SPACE_apdevet/config/mysqli_connect.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, $_POST['password']);

    $query = "SELECT * FROM cust_users WHERE username = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        if ($password === $stored_password) {
            $_SESSION['username'] = $username;
            echo "Login successful, redirecting...";
            header('Location: /SPACE/SPACE_apdevet/pages/user.php');
            exit();
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Invalid username or password.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        }
                    });
                </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Invalid username or password.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'swal2-confirm'
                    }
                });
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In</title>
<link rel="stylesheet" href="./asset/css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="login-container">
    <h1>Log In</h1>
    <p>Sign up now and enjoy a 15% discount on your first purchase!</p>

    <form action="index.php" method="POST">
        <div class="input-container">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-container">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit">Login</button>
        <div class="register-container">
            <p>Don't have an account? <a href="/SPACE/SPACE_apdevet/pages/register.php">Register</a></p>
        </div>
    </form>
</div>

</body>
</html>
