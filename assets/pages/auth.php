<?php

    session_start();

    require '../../inc/db-connect.php';

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        echo 'You don\'t have the right to access this page';
        exit;
    }

    // Set Error Function

    function set_error($msg) {
        $_SESSION['msg'] = $msg;
        $_SESSION['status'] = "error";
        header('Location: login.php');
    }

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Get values

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Inputs validation

    if (preg_match('/^[a-zA-Z0-9-_.]{3,70}@[a-zA-Z0-9.]{1,25}\.[a-zA-Z]{1,5}$/', $email) == 0) {
        set_error("Invalid email or password, please try again!");
        exit();
    }

    if (preg_match('/^.{8,16}$/', $password) == 0) {
        set_error("Invalid email or password, please try again!");
        exit();
    }

    $stmt = $conn -> prepare("SELECT `password` FROM users WHERE email = ?");

    if ($stmt === false) {
        set_error("Could not process your request");
        exit();
    }

    $stmt -> bind_param("s", $email);

    if ($stmt -> execute()) {
        $stmt -> bind_result($hashed_password);

        $count = 0;

        while ($stmt->fetch()) {
            if (!password_verify($password, $hashed_password)) {
                set_error("Invalid email or password, please try again!");
                exit();
            }
            $count++;
        }

        if ($count == 0) {
            set_error("Invalid email or password, please try again!");
            exit();
        }

        $token = uniqid('AB-', true);

        $stmt = $conn -> prepare("UPDATE users SET `token` = ?, token_expiration = DATE_ADD(current_timestamp() , INTERVAL 1 HOUR) WHERE email = ?");

        if ($stmt === false) {
            set_error("Could not process your request");
            exit();
        }

        $stmt -> bind_param("ss", $token, $email);

        if ($stmt -> execute()) {

            setcookie("auth", $email . ",," . $token, time() + 3600, "/");

            header('Location: ../../index.php');
            exit();
        } else {
            set_error("Could not process your request");
            exit();
        }

    } else {
        set_error("Could not process your request");
        exit();
    }