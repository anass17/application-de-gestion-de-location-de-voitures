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
<body>

    <div class="bg-gray-200 h-screen flex justify-center items-center">
        <form action="auth.php" method="POST" class="bg-white px-7 py-6 rounded-lg w-full max-w-lg shadow-md border border-gray-300">
            <h2 class="text-center font-bold text-xl mb-8 text-orange-500">REGISTER</h2>
            <div class="flex gap-3">
                <div class="w-full mb-3">
                    <label for="first_name" class="mb-2 block font-semibold">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="border border-gray-400 rounded px-3 py-1 w-full" placeholder="Ex: Anass">
                </div>
                <div class="w-full mb-3">
                    <label for="last_name" class="mb-2 block font-semibold">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="border border-gray-400 rounded px-3 py-1 w-full" placeholder="Ex: Boutaib">
                </div>
            </div>
            <div class="">
                <div class="w-full mb-3">
                    <label for="email" class="mb-2 block font-semibold">Email</label>
                    <input type="text" id="email" name="email" class="border border-gray-400 rounded px-3 py-1 w-full" placeholder="Ex: anassboutaib2018@gmail.com">
                </div>
            </div>
            <div class="">
                <div class="w-full mb-3">
                    <label for="password" class="mb-2 block font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="border border-gray-400 rounded px-3 py-1 w-full" placeholder="Ex: At least 8 Chars">
                </div>
                <div class="w-full mb-3">
                    <label for="confirm-password" class="mb-2 block font-semibold">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="border border-gray-400 rounded px-3 py-1 w-full" placeholder="Ex: Rewrite password">
                </div>
            </div>
            <button type="submit" class="px-5 py-2 bg-orange-500 text-white mt-2 rounded-md font-semibold">SUBMIT</button>
        </form>
    </div>
    
    <!-- <script src=""></script> -->
</body>
</html>