<?php
    include "database.php";
    $id = $_GET['id'];
    $finishDate = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="./styles/edit.css">
</head>
<body>
    <?php 
        $query = "SELECT title FROM task WHERE ID_task = '$id'";
        $data = mysqli_query($konekcija, $query);
        $inputData = $data -> fetch_assoc();
    ?>
    <a href="index.php">Cancel</a>
    <div class="confrim-form">
        <form method="POST">
            <label>Are you sure that you want to delete this task: <?php echo $inputData['title'] ?></label>
            <input type="submit" name="delete" value="Yes">
        </form>
    </div>
    <?php 
        if(isset($_POST['delete'])){
            $query = "DELETE FROM task WHERE ID_task = '$id'";
            $delete = mysqli_query($konekcija, $query);
            if($delete){
                header("Location:index.php");
            }
        }
    ?>
</body>
</html>