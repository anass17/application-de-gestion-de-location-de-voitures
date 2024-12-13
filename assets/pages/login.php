<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-[url('../imgs/login.jpg')] bg-cover bg-center" style="backdrop-filter: brightness(0.4);">

    <div class="h-screen flex justify-center items-center px-3">
        <form action="auth.php" method="POST" class="bg-white px-7 py-6 rounded-lg w-full max-w-lg shadow-md border border-gray-300">
            <h2 class="text-center font-bold text-3xl mb-8 text-orange-500">Log In</h2>
            <div class="">
                <div class="w-full mb-3">
                    <label for="email" class="mb-2 block font-semibold">Email</label>
                    <input type="text" id="email" name="email" class="outline-none border border-gray-400 rounded px-3 py-1 w-full bg-orange-500 bg-opacity-20 border-orange-300 placeholder-gray-600" placeholder="Ex: anass@gmail.com">
                </div>
            </div>
            <div class="">
                <div class="w-full mb-3">
                    <label for="password" class="mb-2 block font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="outline-none border border-gray-400 rounded px-3 py-1 w-full bg-orange-500 bg-opacity-20 border-orange-300 placeholder-gray-600" placeholder="Ex: At least 8 Chars">
                </div>
            </div>
            <div>
                <a href="#" class="text-blue-500 font-semibold">Forgot password?</a>
            </div>
            <button type="submit" class="px-5 py-2 bg-orange-500 text-white mt-7 rounded-md font-semibold">Login</button>
        </form>
    </div>

    <?php
        if (isset($_SESSION["msg"])) {
            echo 
            '<div class="alert fixed alert-msg text-gray-800 text-center top-5 left-1/2 -translate-x-1/2 w-full max-w-lg p-7 shadow-lg bg-red-300 border-red-500 border z-50 rounded-xl">
                <h2 class="mb-3 font-bold text-lg">Something went wrong!</h2>
                <p>' . $_SESSION["msg"] . '</p>
            </div>';

            echo 
            '<script>
                let alertMsg = document.querySelector(".alert");
                setTimeout(() => {
                    alertMsg.remove();
                }, 4000);
            </script>';
    
            unset($_SESSION["msg"]);
            unset($_SESSION["status"]);
        }
    ?>
    
    <!-- <script src=""></script> -->
</body>
</html>