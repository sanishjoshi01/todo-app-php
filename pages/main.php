<?php
if (isset($_SESSION["name"])):
    $user_id = $_SESSION["user_id"];
?>
<div class="max-w-3xl mx-auto">
    <form action="../actions/create-task.php" method="POST">
        <div class="flex items-center justify-center gap-2">
            <input type="hidden" name="user-id" value="<?= $user_id ?>">
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
                $query = "SELECT * FROM items WHERE user_id = '$user_id'";
                $result = mysqli_query($conn, $query);

                if ($result):
                    while ($row = mysqli_fetch_assoc($result)):
                        $id = $row["id"];
                        $taskname = $row["task_name"];
                        $is_completed = $row['is_completed'] ? 'checked' : '';
                        $isEditing = isset($_POST['edit-id']) && $_POST['edit-id'] == $id;
                ?>
            <!-- task item  -->
            <div class='bg-gray-600 p-4 rounded-xl flex items-center'>
                <div class='flex-1 min-w-0'>
                    <?php if ($isEditing): ?>
                    <!-- edit form  -->
                    <form action="../actions/edit-task.php" method="POST" class="flex-1 flex items-center gap-2">
                        <input type="hidden" name="id" value="<?= $id ?>" />
                        <textarea type="text" name="task_name"
                            class="block flex-1 p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required <?= $isEditing ? "autofocus" : "" ?>><?= $taskname ?></textarea>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg mr-4 py-2 px-3 bg-blue-600 hover:bg-blue-700">
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                    </form>
                    <?php else: ?>

                    <!-- checkbox form  -->
                    <form action="../actions/complete-task.php" method="POST" class="flex items-center">
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
                    <?php endif; ?>
                </div>

                <div class='inline-flex items-center text-base font-semibold text-gray-900 dark:text-white gap-4'>
                    <!-- update button  -->
                    <?php if (!$isEditing): ?>
                    <form action="/" method="post">
                        <input type="hidden" name="edit-id" value="<?= $id ?>" />
                        <button type="submit">
                            <i class=" fa-solid fa-pen-to-square cursor-pointer hover:text-gray-400"></i>
                        </button>
                    </form>
                    <?php endif; ?>

                    <!-- delete button  -->
                    <form action="../actions/delete-task.php" method="post">
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
<?php
else:
?>
<p>Please login or register to continue</p>

<?php endif; ?>