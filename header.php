<?php

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $id = $_SESSION['user_id'];
}
?>
<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">TODO APP</span>
            </a>
            <div class="flex items-center lg:order-2">
                <!-- login or username  -->
                <?php if (isset($_SESSION['name'])) : ?>
                    <p class="text-white">Hello, <?= $name ?></p>
                <?php else: ?>
                    <a href="/login"
                        class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log
                        in</a>
                <?php endif; ?>

                <!-- signup or logout -->
                <?php if (isset($_SESSION['name'])) : ?>
                    <a href="/actions/logout-user.php"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Logout</a>
                <?php else: ?>
                    <a href="/signup"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Sign
                        Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>