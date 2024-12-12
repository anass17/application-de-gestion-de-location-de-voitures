<?php

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        echo 'You don\'t have the right to access this page';
    }

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    