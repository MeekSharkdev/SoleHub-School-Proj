<?php
    include('mysqli_connect.php');
    session_start();

    $clients_check = $_SESSION['login_clients'];
    $ses_sql = mysqli_query($dbc,"select username from clients where username = '$clients_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['username'];
    if(!isset($_SESSION['login_user'])){
        header("Location: login.php");
        die();
    }
?>