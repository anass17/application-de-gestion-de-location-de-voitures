<?php
    session_start();
    require '../../inc/db-connect.php';

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        exit('Error! You don\'t have the right to access this page');
    }

    $form_type = isset($_POST["form-type"]) ? $_POST["form-type"] : "";
    $name = isset($_POST["full-name"]) ? $_POST["full-name"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";
    $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    // Set Error

    function set_error($msg, $page) {
        $_SESSION['msg'] = $msg;
        $_SESSION['status'] = "error";
        header('Location: ../../index.php?page=' . $page);
    }

    // Client

    if ($form_type == "client") {
        if (preg_match('/^[a-z A-Z]{3,50}$/', $name) == 0) {
            set_error("The name is invalid", 'clients');
            exit();
        }
        if (preg_match('/^[a-z A-Z0-9-,]{3,100}$/', $address) == 0) {
            set_error("The address is invalid", 'clients');
            exit();
        }
        if (preg_match('/^[0][567][0-9]{8}$/', $tel) == 0) {
            set_error("The phone number is invalid", 'clients');
            exit();
        }
        if (preg_match('/^[a-zA-Z0-9-_.]{3,70}@[a-zA-Z0-9.]{1,25}\.[a-zA-Z]{1,5}$/', $email) == 0) {
            set_error("The email is invalid", 'clients');
            exit();
        }

        $stmt = $conn -> prepare("INSERT INTO clients (Nom, Adresse, Tel, Email) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            set_error("Could not add the new client", 'clients');
            exit();
        }

        $stmt -> bind_param("ssss", $name, $address, $tel, $email);

        if ($stmt -> execute()) {
            $_SESSION['msg'] = "The client '$name' was successfully added";
            $_SESSION['status'] = "success";
            header('Location: ../../index.php?page=clients');
        } else {
            set_error("Could not add the new client", 'clients');
        }

    } else {
        set_error("There was an error in your request", 'clients');
    }