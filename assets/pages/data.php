<?php
    session_start();
    require '../../inc/db-connect.php';

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        exit('Error! You don\'t have the right to access this page');
    }

    $form_type = isset($_POST["form-type"]) ? $_POST["form-type"] : "";

    // Set Error Function

    function set_error($msg, $page) {
        $_SESSION['msg'] = $msg;
        $_SESSION['status'] = "error";
        header('Location: ../../index.php?page=' . $page);
    }

    // Client

    if ($form_type == "clients") {

        // Get input values

        $name = isset($_POST["full-name"]) ? $_POST["full-name"] : "";
        $address = isset($_POST["address"]) ? $_POST["address"] : "";
        $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";

        // Validate inputs

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

        // Insert new client

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
        
        // Get input values

        $modele = isset($_POST["modele"]) ? $_POST["modele"] : "";
        $marque = isset($_POST["marque"]) ? $_POST["marque"] : "";
        $matriculation = isset($_POST["matriculation"]) ? $_POST["matriculation"] : "";
        $annee = isset($_POST["annee"]) ? $_POST["annee"] : "";
        $price = isset($_POST["price"]) ? $_POST["price"] : "";

        // Validate inputs

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

        // Insert new car

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
    } else if ($form_type == "contrats") {

        // Get values

        $start_date = isset($_POST["start-date"]) ? $_POST["start-date"] : "";
        $end_date = isset($_POST["end-date"]) ? $_POST["end-date"] : "";
        $duration = isset($_POST["duration"]) ? $_POST["duration"] : "";
        $client = isset($_POST["client"]) ? $_POST["client"] : "";
        $matriculation = isset($_POST["matriculation"]) ? $_POST["matriculation"] : "";

        // Inputs validation

        if (preg_match('/^[1-2][0-9]{3}-([0][1-9]|[1][0-2])-([0][1-9]|[12][0-9]|[3][01])$/', $start_date) == 0) {
            set_error("The start date is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[1-2][0-9]{3}-([0][1-9]|[1][0-2])-([0][1-9]|[12][0-9]|[3][01])$/', $end_date) == 0) {
            set_error("The end date is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[1-9][0-9]*$/', $duration) == 0) {
            set_error("The duration is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[a-z A-Z]{3, 50}$/', $client) == 0) {
            set_error("The client name is invalid", $form_type);
            exit();
        }
        if (preg_match('/^[A-Za-z0-9]{3,10}$/', $matriculation) == 0) {
            set_error("The matriculation is invalid", $form_type);
            exit();
        }

        // Check if the entered user exists

        $stmt = $conn -> prepare("SELECT NumClient FROM clients WHERE Nom = ?");
        
        if ($stmt === false) {
            set_error("Could not process your request", $form_type);
            exit();
        }

        $stmt -> bind_param("s", $client);
        $idNum = 0;

        if ($stmt -> execute()) {
            $stmt -> bind_result($id);

            while ($stmt->fetch()) {
                $idNum = $id;
            }

            if ($idNum == 0) {
                echo 'This user does not exist';
            }
        } else {
            set_error("Could not process your request", $form_type);
            exit();
        }

        // Check if the entered Immatriculation Number exists

        $stmt = $conn -> prepare("SELECT NumImmatriculation FROM voitures WHERE NumImmatriculation = ?");
        
        if ($stmt === false) {
            set_error("Could not process your request", $form_type);
            echo 'error';
            exit();
        }
        
        $stmt -> bind_param("s", $matriculation);
        $isExist = 0;

        if ($stmt -> execute()) {
            $stmt -> bind_result($id);

            while ($stmt->fetch()) {
                $isExist = 1;
            }

            if ($isExist == 0) {
                echo 'This Immatriculation Number does not exist';
            }
        } else {
            set_error("Could not process your request", $form_type);
            exit();
        }

        // Insert new contract

        $stmt = $conn -> prepare("INSERT INTO contracts (NumClient, StartDate, EndDate, duration, NumImmatriculation) VALUES (?, ?, ?, ?, ?)");

        if ($stmt === false) {
            set_error("Could not process your request", $form_type);
            exit();
        }

        $stmt -> bind_param("issis", $idNum, $start_date, $end_date, $duration, $matriculation);

        if ($stmt -> execute()) {
            $_SESSION['msg'] = "The contract '$client | $matriculation' was successfully added";
            $_SESSION['status'] = "success";
            header('Location: ../../index.php?page=' . $form_type);
        } else {
            echo 'error';
            set_error("Could not process your request", $form_type);
        }
    } else if ($form_type == "edit-voitures") {

        // Get input values

        $modele = isset($_POST["modele"]) ? $_POST["modele"] : "";
        $marque = isset($_POST["marque"]) ? $_POST["marque"] : "";
        $matriculation = isset($_POST["matriculation"]) ? $_POST["matriculation"] : "";
        $annee = isset($_POST["annee"]) ? $_POST["annee"] : "";
        $price = isset($_POST["price"]) ? $_POST["price"] : "";

        // Validate inputs

        if (preg_match('/^[a-z A-Z0-9]{3,50}$/', $modele) == 0) {
            set_error("The modele is invalid", "voitures");
            exit();
        }
        if (preg_match('/^[a-z A-Z0-9]{3,50}$/', $marque) == 0) {
            set_error("The marque is invalid", "voitures");
            exit();
        }
        if (preg_match('/^[0-9A-Za-z]{3,10}$/', $matriculation) == 0) {
            set_error("The matriculation number is invalid", "voitures");
            exit();
        }
        if (preg_match('/^[12][0-9]{3}$/', $annee) == 0) {
            set_error("The annee is invalid", "voitures");
            exit();
        }
        if (preg_match('/^[1-9][0-9]{1,4}$/', $price) == 0) {
            set_error("The price is invalid", "voitures");
            exit();
        }

        // update an existing car

        $stmt = $conn -> prepare("UPDATE voitures SET modele = ?, marque = ?, annee = ?, price = ? WHERE NumImmatriculation = ?");

        if ($stmt === false) {
            set_error("Could not process your request", "voitures");
            exit();
        }

        $stmt -> bind_param("ssiis", $modele, $marque, $annee, $price, $matriculation);

        if ($stmt -> execute()) {
            $_SESSION['msg'] = "The car '$modele - $marque' was successfully edited";
            $_SESSION['status'] = "success";
            header('Location: ../../index.php?page=' . "voitures");
        } else {
            set_error("Could not process your request", "voitures");
        }
    } else {
        set_error("There was an error in your request", 'clients');
    }