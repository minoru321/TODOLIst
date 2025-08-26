<?php 

    $todo = [];
    $runing = true;

    function menu() {
        echo "\n===== TODO App ===\n";
        echo "1. View Tasks \n";
        echo "2. Add task\n";
        echo "3. Remove task\n";
        echo "4. Exit\n";
        echo "Choose Option: ";
    }

    #Main Loop
    while ($runing) {
        menu();
        $choice = trim(fgets(STDIN));

        switch ($choice) {
        case 1: // View tasks
            if (empty($todos)) {
                echo "No tasks yet!\n";
            } else {
                echo "\n--- Your Tasks ---\n";
                foreach ($todos as $index => $task) {
                    echo ($index + 1) . ". $task\n";
                }
            }
            break;

        case 2: // Add task
            echo "Enter new task: ";
            $task = trim(fgets(STDIN));
            if ($task !== "") {
                $todos[] = $task;
                echo "Task added!\n";
            } else {
                echo "Task cannot be empty.\n";
            }
            break;

        case 3: // Remove task
            echo "Enter task number to remove: ";
            $num = (int)trim(fgets(STDIN));
            if ($num > 0 && $num <= count($todos)) {
                unset($todos[$num - 1]);
                $todos = array_values($todos); // reindex array
                echo "Task removed!\n";
            } else {
                echo "Invalid task number.\n";
            }
            break;

        case 4: // Exit
            echo "Goodbye!\n";
            $running = false;
            break;

        default:
            echo "Invalid option. Try again.\n";
    }
}
?>