<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solehub</title>
    <link rel="icon" type="image/x-icon" href="../asset/images/hero-bg.jpg">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="../asset/css/header.css"> 

</head>

<body>
    <!-- Header Start -->
    <header class="header-area">
        <div class="logo">
            <a href="/SPACE/SPACE_apdevet/pages/home.php">
                <h3>SOLEHUB'S</h3>
            </a>
        </div>
        <div class="header-top">
            <ul>
                <li><a href="/SPACE/SPACE_apdevet/pages/home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li>
                    <a href="#">Pages <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-pages">
                        <ul>
                            <li><a href="/SPACE/SPACE_apdevet/pages/register.php">Registration</a></li>
                            <li><a href="/SPACE/SPACE_apdevet/pages/delete.php">Delete</a></li>
                            <li><a href="/SPACE/SPACE_apdevet/pages/update.php">Update</a></li>
                            <li><a href="/SPACE/SPACE_apdevet/pages/records.php">Records</a></li>
                        </ul>
                    </div>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                <li><a href="/SPACE/SPACE_apdevet/index.php" id="logoutButton" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <!-- Header End -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutButton = document.getElementById('logoutButton');

        if (logoutButton) {
            logoutButton.addEventListener('click', function(event) {
                event.preventDefault(); 

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to log out?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7066e0',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log me out!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = logoutButton.getAttribute('href');
                    }
                });
            });
        }
    });
    </script>
</body>
</html>
