<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../asset/css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        <?php include '../asset/css/register.css'; ?>
        .swal2-confirm, .swal2-cancel {
            padding: 10px 24px; 
            font-size: 16px; 
            width: auto !important; 
        }

        .swal2-popup {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

<?php
session_start();

include('../config/mysqli_connect.php');

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, $_POST['password']);
    $password2 = mysqli_real_escape_string($dbc, $_POST['password2']);
    $address = mysqli_real_escape_string($dbc, trim($_POST['address']));
    $city = mysqli_real_escape_string($dbc, trim($_POST['city']));
    $contact = mysqli_real_escape_string($dbc, trim($_POST['contact']));
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $birthplace = mysqli_real_escape_string($dbc, trim($_POST['birthplace']));
    $age = mysqli_real_escape_string($dbc, trim($_POST['age']));

    if (empty($firstname)) {
        $errors[] = "Please enter your first name.";
    }
    if (empty($lastname)) {
        $errors[] = "Please enter your last name.";
    }
    if (empty($email)) {
        $errors[] = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($username)) {
        $errors[] = "Please enter your username.";
    }
    if (empty($password)) {
        $errors[] = "Please enter your password.";
    }
    if ($password != $password2) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($address)) {
        $errors[] = "Please enter your home address.";
    }
    if (empty($city)) {
        $errors[] = "Please enter your city.";
    }
    if (empty($contact)) {
        $errors[] = "Please enter your contact number.";
    } elseif (!preg_match("/^\d{11}$/", $contact)) {
        $errors[] = "Contact number must be exactly 11 digits.";
    }
    if (empty($birthdate)) {
        $errors[] = "Please enter your date of birth.";
    } elseif (!validateDate($birthdate, 'Y-m-d')) {
        $errors[] = "Invalid date format for birthdate.";
    }
    if (empty($birthplace)) {
        $errors[] = "Please enter your place of birth.";
    }
    if (empty($age)) {
        $errors[] = "Please enter your age.";
    } elseif (!filter_var($age, FILTER_VALIDATE_INT) || $age <= 0) {
        $errors[] = "Please enter a valid age.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO cust_users (firstname, lastname, email, username, password, address, city, contact, birthdate, birthplace, age)
                VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$address', '$city', '$contact', '$birthdate', '$birthplace', '$age')";

        if (mysqli_query($dbc, $sql)) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful!',
                        text: 'You have successfully registered.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal2-confirm'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../index.php';
                        }
                    });
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
        }
        mysqli_close($dbc);
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    html: '" . implode("<br>", $errors) . "',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'swal2-confirm'
                    }
                });
            </script>";
    }
}
?>

<div class="form-container">
    <div class="form-content">
        <h1>Register</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname"><i class="fas fa-user"></i> First Name:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name...">
                </div>
                <div class="form-group">
                    <label for="lastname"><i class="fas fa-user"></i> Last Name:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="address"><i class="fas fa-home"></i> Address:</label>
                    <input type="text" id="address" name="address" placeholder="Address...">
                </div>
                <div class="form-group">
                    <label for="city"><i class="fas fa-city"></i> City:</label>
                    <select id="city" name="city">
                        <option value="">-- Select City --</option>
                        <option value="quezon city">Quezon City</option>
                        <option value="caloocan">Caloocan City</option>
                        <option value="manila">Manila</option>
                        <option value="navotas">Navotas City</option>
                        <option value="pasay">Pasay City</option>
                        <option value="valenzuela">Valenzuela City</option>
                        <option value="mandaluyong">Mandaluyong City</option>
                        <option value="san juan">San Juan City</option>
                        <option value="las piñas">Las Piñas City</option>
                        <option value="muntinlupa">Muntinlupa City</option>
                        <option value="parañaque">Parañaque City</option>
                        <option value="taguig">Taguig City</option>
                        <option value="pasig">Pasig City</option>
                        <option value="marikina">Marikina City</option>
                        <option value="pateros">Pateros City</option>
                        <option value="malabon">Malabon City</option>
                        <option value="cainta">Cainta City</option>
                        <option value="san mateo">San Mateo City</option>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="contact"><i class="fas fa-phone"></i> Contact Number:</label>
                    <input type="text" id="contact" name="contact" placeholder="Contact Number...">
                </div>
                <div class="form-group">
                    <label for="birthdate"><i class="fas fa-calendar-alt"></i> Date of Birth:</label>
                    <input type="date" id="birthdate" name="birthdate">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="birthplace"><i class="fas fa-globe"></i> Place of Birth:</label>
                    <input type="text" id="birthplace" name="birthplace" placeholder="Place of Birth...">
                </div>
                <div class="form-group">
                    <label for="age"><i class="fas fa-birthday-cake"></i> Age:</label>
                    <input type="number" id="age" name="age" placeholder="Age...">
                </div>
            </div>

            <h1>Sign up</h1>
            <p>Join us and start exploring today!</p>
            <div class="form-row">
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email...">
                </div>
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username:</label>
                    <input type="text" id="username" name="username" placeholder="Username...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password...">
                </div>
                <div class="form-group">
                    <label for="password2"><i class="fas fa-lock"></i> Confirm Password:</label>
                    <input type="password" id="password2" name="password2" placeholder="Confirm Password...">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="login-link">
            <p>Already have an account? <a href="../index.php   ">Log In</a></p>
        </div>
    </div>
</div>

</body>
</html>
