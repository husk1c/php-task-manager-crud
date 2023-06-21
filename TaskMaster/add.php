<?php 
    include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="./styles/styleadd.css">
</head>
<body>
    <section>
        <a href="index.php">Cancel</a>
        <div class="form-add">
            <form method="POST">
                <div class="container">
                    <input type="text" name="title" placeholder="task">
                    <label class="title">Title</label>
                </div>
                <div class="container">
                    <input type="text" name="desc" placeholder="Your description">
                    <label class="title">Description</label>
                </div>
                <div class="rest">
                <label>Expiry date</label>
                <input type="date" name="date">
                <input type="submit" name="add" value="Add">
                </div>
            </form>
        </div>
    </section>
    <?php 
        if(isset($_POST['add'])){
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $date = $_POST['date'];
            $status = 1;
            $sql = "INSERT INTO task VALUES (null, '$title','$desc','$date',null,'$status')";

            $unos = mysqli_query($konekcija, $sql);
            if($unos){
                header("Location:index.php");
            }
        }
    ?>
</body>
</html>