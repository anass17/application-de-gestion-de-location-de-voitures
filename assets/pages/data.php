<?php
    session_start();
    require '../../inc/db-connect.php';

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        exit('Error! You don\'t have the right to access this page');
    }

    $form_type = isset($_POST["form-type"]) ? $_POST["form-type"] : "";

    // Set Error

    function set_error($msg, $page) {
        $_SESSION['msg'] = $msg;
        $_SESSION['status'] = "error";
        header('Location: ../../index.php?page=' . $page);
    }

    // Client

    if ($form_type == "clients") {

        $name = isset($_POST["full-name"]) ? $_POST["full-name"] : "";
        $address = isset($_POST["address"]) ? $_POST["address"] : "";
        $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";

        if (preg_match('/^[a-z A-Z]{3,50}$/', $name) == 0) {
            set_error("The name is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[a-z A-Z0-9-,]{3,100}$/', $address) == 0) {
            set_error("The address is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[0][567][0-9]{8}$/', $tel) == 0) {
            set_error("The phone number is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[a-zA-Z0-9-_.]{3,70}@[a-zA-Z0-9.]{1,25}\.[a-zA-Z]{1,5}$/', $email) == 0) {
            set_error("The email is invalid", $form_type);
            exit();
        }

        $stmt = $conn -> prepare("INSERT INTO clients (Nom, Adresse, Tel, Email) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            set_error("Could not add the new client", $form_type);
            exit();
        }

        $stmt -> bind_param("ssss", $name, $address, $tel, $email);

        if ($stmt -> execute()) {
            $_SESSION['msg'] = "The client '$name' was successfully added";
            $_SESSION['status'] = "success";
            header('Location: ../../index.php?page=' . $form_type);
        } else {
            set_error("Could not add the new client", $form_type);
        }
    } else if ($form_type == "voitures") {
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';

        $modele = isset($_POST["modele"]) ? $_POST["modele"] : "";
        $marque = isset($_POST["marque"]) ? $_POST["marque"] : "";
        $matriculation = isset($_POST["matriculation"]) ? $_POST["matriculation"] : "";
        $annee = isset($_POST["annee"]) ? $_POST["annee"] : "";
        $price = isset($_POST["price"]) ? $_POST["price"] : "";


        if (preg_match('/^[a-z A-Z0-9]{3,50}$/', $modele) == 0) {
            set_error("The modele is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[a-z A-Z0-9]{3,50}$/', $marque) == 0) {
            set_error("The marque is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[0-9A-Za-z]{3,10}$/', $matriculation) == 0) {
            set_error("The matriculation number is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[12][0-9]{3}$/', $annee) == 0) {
            set_error("The annee is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[1-9][0-9]{1,4}$/', $price) == 0) {
            set_error("The price is invalid", $form_type);
            exit();
        }

        $stmt = $conn -> prepare("INSERT INTO voitures VALUES (?, ?, ?, ?, ?)");

        if ($stmt === false) {
            set_error("Could not add the new car", $form_type);
            exit();
        }

        $stmt -> bind_param("sssss", $matriculation, $marque, $modele, $annee, $price);

        if ($stmt -> execute()) {
            $_SESSION['msg'] = "The car '$modele - $marque' was successfully added";
            $_SESSION['status'] = "success";
            header('Location: ../../index.php?page=' . $form_type);
        } else {
            set_error("Could not add the new car", $form_type);
        }
    } else {
        set_error("There was an error in your request", 'voiture');
    }