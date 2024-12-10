<?php
    require "inc/db-connect.php";

    $page = 'clients';

    if (isset($_GET["page"])) {
        if ($_GET["page"] == "voitures") {
            $page = 'voitures';
        } elseif ($_GET["page"] == "contrats") {
            $page = 'contrats';
        }
    }

    $view = "cards";
    
    if (isset($_GET["view"]) && $_GET["view"] == "tables") {
        $view = "tables";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    
    <div class="flex">

        <!-- Menu -->

        <div class="w-[300px] bg-gray-800 h-screen text-white">

            <!-- Menu Header -->

            <div class="px-7 py-5 flex justify-between items-center">
                <h2 class="text-lg font-bold">Menu</h2>
                <button type="button" class="w-[20px] h-[15px] flex flex-col justify-between">
                    <span class="rounded h-[3px] w-full bg-orange-500 block"></span>
                    <span class="rounded h-[3px] w-full bg-orange-500 block"></span>
                    <span class="rounded h-[3px] w-full bg-orange-500 block"></span>
                </button>
            </div>

            <!-- Information -->

            <div class="mx-7 my-3 relative after:w-full after:h-[1px] after:bg-gray-500 after:absolute after:block after:left-0 after:top-[14px]">
                <h3 class="text-gray-400 bg-gray-800 relative z-50 inline-block pr-[10px]">Information</h3>
                <ul class="pt-4">
                    <li class="mb-5">
                        <a href="/index.php?page=clients&view=<?php echo $view ?>" class="flex">
                            <div class="w-[22px] flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-orange-500" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                            </div>
                            <span class="inline-block ml-5 <?php if ($page == "clients") {echo "text-orange-500 font-bold";} ?>">Clients</span>
                        </a>
                    </li>
                    <li class="mb-5">
                        <a href="/index.php?page=voitures&view=<?php echo $view ?>" class="flex">
                            <div class="w-[22px] flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" class="fill-orange-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 117.4L109.1 192l293.8 0-26.1-74.6C372.3 104.6 360.2 96 346.6 96L165.4 96c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32l181.2 0c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2l0 144 0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L96 400l0 48c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-48L0 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                            </div>
                            <span class="inline-block ml-5 <?php if ($page == "voitures") {echo "text-orange-500 font-bold";} ?>">Cars</span>
                        </a>
                    </li>
                    <li class="mb-5">
                        <a href="/index.php?page=contrats&view=<?php echo $view ?>" class="flex">
                            <div class="w-[22px] flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" class="fill-orange-500" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm54.2 253.8c-6.1 20.3-24.8 34.2-46 34.2L80 416c-8.8 0-16-7.2-16-16s7.2-16 16-16l8.2 0c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.7 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8 54.1 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 349l-9.8 32.8z"/></svg>
                            </div>
                            <span class="inline-block ml-5 <?php if ($page == "contrats") {echo "text-orange-500 font-bold";} ?>">Contracts</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- View -->

            <div class="mx-7 my-3 relative after:w-full after:h-[1px] after:bg-gray-500 after:absolute after:block after:left-0 after:top-[14px]">
                <h3 class="text-gray-400 bg-gray-800 relative z-50 inline-block pr-[10px]">View</h3>
                <ul class="pt-4">
                    <li class="mb-5">
                        <a href="/index.php?page=<?php echo $page; ?>&view=cards" class="flex">
                            <div class="w-[22px] flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-orange-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 96l0 128-160 0 0-128 160 0zm0 192l0 128-160 0 0-128 160 0zM224 224L64 224 64 96l160 0 0 128zM64 288l160 0 0 128L64 416l0-128zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32z"/></svg>
                            </div>
                            <span class="inline-block ml-5 <?php if ($view != "tables") {echo "text-orange-500 font-bold";} ?>">Cards</span>
                        </a>
                    </li>
                    <li class="mb-5">
                        <a href="/index.php?page=<?php echo $page; ?>&view=tables" class="flex" class="flex">
                            <div class="w-[22px] flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="fill-orange-500" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm64 0l0 64 64 0 0-64L64 96zm384 0L192 96l0 64 256 0 0-64zM64 224l0 64 64 0 0-64-64 0zm384 0l-256 0 0 64 256 0 0-64zM64 352l0 64 64 0 0-64-64 0zm384 0l-256 0 0 64 256 0 0-64z"/></svg>
                            </div>
                            <span class="inline-block ml-5 <?php if ($view == "tables") {echo "text-orange-500 font-bold";} ?>">Tables</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Page Content -->
        
        <div class="container mx-auto px-3 py-10 max-w-[1200px]">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET["page"]) && $_GET["page"] == "voitures") {
                            $sql = "SELECT * FROM voitures";
                            $result = $conn->query($sql);

                            echo '<h2 class="text-center mb-10 font-bold text-2xl">List of cars</h2>';

                            if ($result->num_rows > 0) {
                                if ($view == "cards") {
                                    echo '<div class="group grid grid-cols-3 gap-5">';
                                    while($row = $result->fetch_assoc()) {
                                        echo 
                                        "<div class='rounded-lg shadow-[0px_0px_15px_rgba(0,0,0,.25)] bg-white py-6 px-7'>
                                            <h3 class='text-center mb-5 font-bold text-[18px] text-orange-500'>" . $row['modele'] . "</h3>
                                            <div class='flex justify-between items-center mb-4'>
                                                <p class='text-center'>" . $row['marque'] . "</p>
                                                <p class=''><b>" . $row['price'] . "</b> MAD/D</p>
                                            </div>
                                            <div class='relative after:w-full after:h-[1px] after:bg-gray-300 after:absolute after:block after:left-0 after:top-[14px]'>
                                                <h4 class='relative z-50 bg-white pr-3 inline-block text-gray-600'>Car's details</h4>
                                                <div class='mt-3'>
                                                    <p><b>Immatriculation:</b> " . $row['NumImmatriculation'] . "</p>
                                                </div>
                                                <div class='mt-3'>
                                                    <p class=''><b>Annee:</b> " . $row['annee'] . "</p>
                                                </div>
                                                <button type='button' class='bg-orange-500 rounded block w-32 py-3 text-white mx-auto mt-5'>Book Now</button>
                                            </div>
                                        </div>";
                                    }
                                    echo '</div>';
                                } else {
                                    echo 
                                    '<table class="border-collapse table-auto border w-full text-center">
                                        <thead class="bg-gray-200">
                                            <tr class="*:py-3">
                                                <th>Name</th>
                                                <th>Marque</th>
                                                <th>Price</th>
                                                <th>NumImmatriculation</th>
                                                <th>Annee</th>
                                            </tr>
                                        </thead>
                                        <tbody class="even:*:bg-orange-100">';
                                            while($row = $result->fetch_assoc()) {
                                                echo 
                                                '<tr class="*:py-3">
                                                    <td>' . $row["modele"] . '</td>
                                                    <td>' . $row['marque'] . '</td>
                                                    <td>' . $row['price'] . ' MAD/D</td>
                                                    <td>' . $row['NumImmatriculation'] . '</td>
                                                    <td>' . $row['annee'] . '</td>
                                                </tr>';
                                            }
                                        echo '</tbody>';
                                    echo '</table>';
                                }
                            } else {
                                echo 
                                "<div>
                                    <p class='text-md text-center'>No clients were found</p>
                                </div>";
                            }
                        } else {
                            $sql = "SELECT * FROM clients";
                            $result = $conn->query($sql);

                            echo '<h2 class="text-center mb-10 font-bold text-2xl">List of clients</h2>';

                            if ($result->num_rows > 0) {
                                if ($view == "cards") {
                                    echo '<div class="grid grid-cols-3 gap-5">';
                                    while($row = $result->fetch_assoc()) {
                                        echo 
                                        "<div class='group rounded-lg shadow-[0px_0px_15px_rgba(0,0,0,.25)] bg-white py-5 px-7 relative'>
                                            <span class='hidden'>" . $row['NumClient'] . "</span>
                                            <h3 class='text-center mb-5 font-bold text-[18px] text-orange-500'>" . $row['Nom'] . "</h3>
                                            <div class='flex justify-center gap-4 items-center mb-4'>
                                                <svg xmlns=\"http://www.w3.org/2000/svg\" class='fill-gray-500' viewBox=\"0 0 384 512\" width='16'><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z\"/></svg>
                                                <p class='text-centerinline-block'>" . $row['Adresse'] . "</p>
                                            </div>
                                            <div class='flex justify-between mb-3 mt-2 items-center'>
                                                <a href='#' class='text-orange-400 font-bold text-sm'>View Contracts</a>
                                                <span><b>Contracts:</b> 5</span>
                                            </div>
                                            <div class='relative after:w-full after:h-[1px] after:bg-gray-300 after:absolute after:block after:left-0 after:top-[14px]'>
                                                <h4 class='relative z-50 bg-white pr-3 inline-block text-gray-600'>Contact</h4>
                                                <div class='flex gap-4 items-center mt-3'>
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width='16' class='fill-gray-500' viewBox=\"0 0 512 512\"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z\"/></svg>
                                                    <p>" . $row['Tel'] . "</p>
                                                </div>
                                                <div class='flex gap-4 items-center mt-3'>
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width='16' class='fill-gray-500' viewBox=\"0 0 512 512\"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z\"/></svg>
                                                    <p class='text-blue-500 font-bold'>" . $row['Email'] . "</p>
                                                </div>
                                            </div>
                                            <div class='absolute top-3 right-4 opacity-0 transition-all group-hover:opacity-100'>
                                                <button type='button'>
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width='15' class='fill-red-500' viewBox=\"0 0 448 512\"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z\"/></svg>
                                                </button>
                                                <button type='button' class='ml-2'>
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width='15' class='fill-blue-500' viewBox=\"0 0 512 512\"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d=\"M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z\"/></svg>
                                                </button>
                                            </div>
                                        </div>";
                                    }
                                    echo '</div>';
                                } else {
                                    echo 
                                    '<div class="border border-gray-200 w-full text-center">
                                        <div class="bg-orange-500 text-white">
                                            <div class="*:py-3 grid grid-cols-4">
                                                <b>Nom</b>
                                                <b>Adresse</b>
                                                <b>Tel</b>
                                                <b>Email</b>
                                            </div>
                                        </div>
                                        <div class="even:*:bg-gray-100">';
                                            while($row = $result->fetch_assoc()) {
                                                echo 
                                                '<div class="*:py-3 relative grid grid-cols-4 group hover:pl-10 transition-all">
                                                    <span>' . $row["Nom"] . '</span>
                                                    <span>' . $row['Adresse'] . '</span>
                                                    <span>' . $row['Tel'] . '</span>
                                                    <span>' . $row['Email'] . '</span>
                                                    <div class="absolute flex justify-center gap-4 top-0 left-4 opacity-0 group-hover:opacity-100 transition-opacity delay-50 duration-300">
                                                        <button type="button" class="flex gap-3">
                                                            <svg xmlns=\"http://www.w3.org/2000/svg\" width="15" class="fill-red-500 pt-1" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z\"/></svg>
                                                        </button>
                                                        <button type="button" class="flex gap-3">
                                                            <svg xmlns=\"http://www.w3.org/2000/svg\" width="15" class="fill-blue-500 pt-1" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z\"/></svg>
                                                        </button>
                                                    </div>
                                                </div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo 
                                "<div>
                                    <p class='text-md text-center'>No clients were found</p>
                                </div>";
                            }
                        }
                    }
                ?>
        </div>
    </div>


    <script src="assets/js/script.js"></script>
</body>
</html>