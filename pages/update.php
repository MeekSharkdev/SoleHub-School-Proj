<?php
include('../includes/header.php');
session_start();

// Redirect to login or register page if user is not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

include('../config/mysqli_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $current_password = $new_password1 = $new_password2 = '';
    $error = array();

    if (empty($_POST['email'])) {
        $error[] = 'You forgot to enter your email address.';
    } else {
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    if (empty($_POST['current_password'])) {
        $error[] = 'You forgot to enter your current password.';
    } else {
        $current_password = mysqli_real_escape_string($dbc, trim($_POST['current_password']));
    }

    if (empty($_POST['new_password1']) || empty($_POST['new_password2'])) {
        $error[] = 'You forgot to enter your new password.';
    } elseif ($_POST['new_password1'] != $_POST['new_password2']) {
        $error[] = 'Your new password did not match the confirmed password.';
    } else {
        $new_password1 = mysqli_real_escape_string($dbc, trim($_POST['new_password1']));
    }

    if (empty($error)) {
        $query = "SELECT id, password FROM cust_users WHERE email = '$email'";
        $result = mysqli_query($dbc, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $stored_password = $row['password'];

            if ($current_password == $stored_password) {
                $q = "UPDATE cust_users SET password = '$new_password1' WHERE id = '{$row['id']}'";
                $r = mysqli_query($dbc, $q);

                if ($r && mysqli_affected_rows($dbc) == 1) {
                    echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Password Updated!',
                                text: 'Your password has been updated successfully.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'swal2-success-button'
                                }
                            }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../index.php';
                                    }             
                            });
                        </script>";
                } else {
                    echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Your password could not be changed due to a system error. We apologize for any inconvenience.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'swal2-cancel'
                                }
                            });
                        </script>";
                }
            } else {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'The current password provided is incorrect.',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'swal2-cancel'
                            }
                        });
                    </script>";
            }
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'The email provided is incorrect.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal2-cancel'
                        }
                    });
                </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    html: 'The following error(s) occurred:<br>" . implode('<br>', $error) . "',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'swal2-cancel'
                    }
                });
            </script>";
    }
}

mysqli_close($dbc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../asset/css/update.css" type="text/css" media="screen"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-color: #3498db; 
            --success-color: #2ecc71; 
            --error-color: #e74c3c;
            --text-color: #ffffff;
            --color-accent: #1a212f;
            --hover-color: #415d88;
            --bg-color: #cfd8e8;
            --warning-color: #f8bb86;
        }

        .swal2-confirm, .swal2-success-button {
            background-color: var(--success-color) !important;
            color: var(--text-color) !important;
        }

        .swal2-cancel {
            background-color: var(--error-color) !important;
            color: var(--text-color) !important;
        }

        .swal2-popup .swal2-title {
            color: var(--primary-color);
        }

        .swal2-popup .swal2-content {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
<div class="form-container">
    <form action="update.php" method="POST">
        <h2>Change Your Password</h2>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="text" name="email" id="email" value="" placeholder="Enter your email address"/>
        </div>
        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" value="" placeholder="Enter your current password"/>
        </div>
        <div class="form-group">
            <label for="new_password1">New Password:</label>
            <input type="password" name="new_password1" id="new_password1" value="" placeholder="Enter your new password"/>
        </div>
        <div class="form-group">
            <label for="new_password2">Confirm New Password:</label>
            <input type="password" name="new_password2" id="new_password2" value="" placeholder="Confirm your new password"/>
        </div>
        <input type="submit" name="submitted" value="Change Password"/>
    </form>
</div>

<div class="footer">
    <?php
    include('../includes/footer.html');
    ?>
</div>
</body>
</html>
