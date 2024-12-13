<?php
    session_start();

    require '../../inc/db-connect.php';

    if ($_COOKIE["auth"]) {
        $auth_params = explode(',,', $_COOKIE['auth']);

        if (preg_match('/^[a-zA-Z0-9-_.]{3,70}@[a-zA-Z0-9.]{1,25}\.[a-zA-Z]{1,5}$/', $auth_params[0]) == 0) {
            header('Location: login.php');
            exit;
        }

        if (preg_match('/^AB-[0-9a-zA-Z]{14}\.[0-9a-zA-Z]{8}$/', $auth_params[1]) == 0) {
            header('Location: login.php');
            exit;
        }

        $stmt = $conn -> prepare("UPDATE users SET token = '', token_expiration = null WHERE email = ?");

        if ($stmt === false) {
            $_SESSION["msg"] = "An error occured while processing your request";
            header('Location: login.php');
            exit;
        }

        $stmt -> bind_param("s", $auth_params[0]);

        if ($stmt -> execute()) {

            setcookie("auth", "", time() - 1000, '/');

            header('Location: login.php');
            exit;

        } else {
            $_SESSION["msg"] = "An error occured while processing your request";
            header('Location: login.php');
            exit;
        }
    } else {
        header('Location: login.php');
    }