<?php

    require "../../inc/db-connect.php";

    // Set Error Function

    function set_error($msg, $page, $view = "") {
        $_SESSION['msg'] = $msg;
        $_SESSION['status'] = "error";
        header('Location: ../../index.php?page=' . $page . '&view=' . $view);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        $view = isset($_GET["view"]) ? $_GET["view"] : "";

        // Verify which page you are comming from

        if ($page == "contrats") {

            // Get values

            $contractId = isset($_GET["id"]) ? $_GET["id"] : "";

            // Validate values

            if (preg_match('/^[1-9][0-9]*$/', $contractId) == 0) {
                set_error("The contract is invalid", $page, $view);
                exit();
            }

            // Delete the row

            $stmt = $conn -> prepare("DELETE FROM `contracts` WHERE NumContrat = ?");

            if ($stmt === false) {
                set_error("Could not process your request", $page, $view);
                exit();
            }

            $stmt -> bind_param("i", $contractId);

            if ($stmt -> execute()) {
                $_SESSION['msg'] = "The client was successfully deleted";
                $_SESSION['status'] = "success";
                header('Location: ../../index.php?page=' . $page . '&view=' . $view);
            } else {
                set_error("Could not process your request", $page, $view);
                exit();
            }
        }
    }

