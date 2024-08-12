<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task"])) {
    $task = $_POST["task"];

    $query = "INSERT INTO items (task_name) VALUES ('$task')";
    mysqli_query($conn, $query);

    // echo "Inserted successfully";     
    header('Location: ' . "/");
}

?>

<div class="max-w-3xl mx-auto">
    <form action="/" method="POST">
        <div class="flex items-center justify-center gap-2">
            <input type="search" id="task" name="task"
                class="block flex-1 p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Add tasks..." required autofocus />
            <button type="submit"
                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700">Add
                task</button>
        </div>
    </form>

    <div class="my-5">
        <h2 class="text-lg font-bold">MY TODOS</h2>

        <div class="flex flex-col mt-4 gap-2">
            <?php
            $query = "SELECT * FROM items";
            $result = mysqli_query($conn, $query);

            if ($result):
                while ($row = mysqli_fetch_assoc($result)):
                    $id = $row["id"];
                    $taskname = $row["task_name"];
                    $is_completed = $row['is_completed'] ? 'checked' : '';
            ?>
                    <div class='bg-gray-600 p-4 rounded-xl flex items-center'>
                        <div class='flex-1 min-w-0 flex items-center '>
                            <form action="/complete-task.php" method="POST">
                                <input type="hidden" name="id" value="<?= $id ?>" />
                                <input type="hidden" name="is_completed" value="<?= $row['is_completed'] ? 0 : 1 ?>" />
                                <input id='<?= $id ?>' type='checkbox' class='w-4 h-4 text-blue-600 bg-gray-100 border-gray-300
                        rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2
                        dark:bg-gray-700 dark:border-gray-600' <?= $is_completed ?> onchange="this.form.submit()" />

                                <label for='<?= $id ?>'
                                    class='ms-2 me-6 text-sm font-medium text-gray-900 dark:text-gray-300 truncate'>
                                    <?= $taskname ?>
                                </label>
                            </form>
                        </div>

                        <div class='inline-flex items-center text-base font-semibold text-gray-900 dark:text-white gap-4'>
                            <form action="/edit-task.php" method="post">
                                <input type="hidden" name="id" value="<?= $id ?>" />
                                <button type="submit">
                                    <i class=" fa-solid fa-pen-to-square cursor-pointer hover:text-gray-400"></i>
                                </button>
                            </form>
                            <form action="/delete-task.php" method="post">
                                <input type="hidden" name="id" value="<?= $id ?>" />
                                <button type="submit">
                                    <i class="fa-solid fa-trash hover:text-red-500 cursor-pointer"></i>
                                </button>
                            </form>

                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>