<?php require_once('task.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Task</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="text-center my-4">Add Task</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" name="title" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="due date">Due Date</label>
                        <input class="form-control" name="due_date" type="date" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-block">Create Task</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h4 class="text-center my-4">Current Task</h4>
                
                <?php foreach(Task::all() as $task) : ?>
                    <ul class="list-group mb-2">
                        <li class="list-group-item active">
                            <?php echo $task->title ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo $task->description ?>
                        </li>
                        <li class="list-group-item">
                            <?php echo $task->due_date ?>
                        </li>
                        <li class="list-group-item">
                            <a class="btn btn-primary" href="edit.php?id=<?php echo $task->id ?>">Edit</a>
                            <a class="btn btn-danger" href="index.php?exec=delete&id=<?php echo $task->id ?>">Delete</a>
                        </li>
                    </ul>
                <?php endforeach  ?>
                
            </div>
        </div>

    </div>
</body>
</html>

<?php 

if(isset($_POST['submit'])) {
    $task = new Task;
    
    $task->title = $database->connection->escape_string($_POST['title']);
    $task->description = $database->connection->escape_string($_POST['description']);
    $task->due_date = $database->connection->escape_string($_POST['due_date']);

    echo $task->create() ? 'Success create' : 'Failed create';
}

if(isset($_GET['exec']) && $_GET['exec'] == 'delete') {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $task = new Task;
        $task = Task::find($id);

        echo $task->delete() ? 'success delete' : 'cannot delete';
    }
}
?>