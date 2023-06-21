<?php 
    include "database.php";
    include "calcdate.php";
    $sql = "SELECT * FROM task";
    $result = mysqli_query($konekcija, $sql);
    while($data = $result->fetch_assoc()){
        updatestatus($data['ID_task'], $data['expiredate']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task master</title>
    <link rel="stylesheet" href="./styles/style.css">
    <script src="https://kit.fontawesome.com/0144dd64a3.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="main-section">
        <div class="commands">
            <a href="add.php">Add new Task</a>
        </div>
        <div class="main-container">
            <h2>Unfinished Tasks</h2>
                <div class="tasks-container">
                    <?php 
                        $sql = "SELECT * FROM task 
                                INNER JOIN status
                                ON task.status_ID=status.ID_status
                                WHERE status_ID = 1";
                        $result = mysqli_query($konekcija, $sql);
                        if($result ->num_rows == 0){
                            echo "<h1>No pending tasks</h1>";  
                        }else{
                            while($data = $result->fetch_assoc()){
                    ?>
                    <div class="task-container">
                        <a href="delete.php?id=<?php echo $data['ID_task'] ?>"><i class="fa-solid fa-trash fa-lg"></i></a>
                        <h3><?php echo "Status: ".$data['Status'] ?></h3>
                        <h3><?php echo $data['title'] ?></h3>
                        <p><?php echo $data['description'] ?></p>
                        <p><?php echo "Task expires at: ".$data['expiredate'] ?> [ <?php echo datecalc($data['expiredate'])?> day(s) ]</p>
                        <a href="editstatus.php?id=<?php echo $data['ID_task'] ?>"><i class="fa-solid fa-square-check fa-lg"></i></a>
                    </div>
                        <?php }} ?>
                </div>
            <h2>Finished Tasks</h2>
                <div class="tasks-container">
                    <?php 
                        $sql = "SELECT * FROM task 
                                INNER JOIN status
                                ON task.status_ID=status.ID_status
                                WHERE status_ID = 2";
                        $result = mysqli_query($konekcija, $sql);
                            if($result ->num_rows == 0){
                                echo "<h1>Finish some tasks</h1>";  
                            }else{
                                while($data = $result->fetch_assoc()){
                    ?>
                    <div class="task-container">
                        <a href="delete.php?id=<?php echo $data['ID_task'] ?>"><i class="fa-solid fa-trash fa-lg"></i></a>
                        <h3><?php echo "Status: ".$data['Status'] ?></h3>
                        <h3><?php echo $data['title'] ?></h3>
                        <p><?php echo $data['description'] ?></p>
                        <p><?php echo "Task finished at: ".$data['finishdate']?> [ <?php echo datecalc($data['finishdate'])?> day(s) ago] </p>
                    </div>
                    <?php }
                    } 
                    ?>
                </div>
            <h2>Expired Tasks</h2>
                <div class="tasks-container">
                    <?php
                        $sql = "SELECT * FROM task 
                                INNER JOIN status
                                ON task.status_ID=status.ID_status
                                WHERE status_ID = 3";
                        $result = mysqli_query($konekcija, $sql);
                            if($result ->num_rows == 0){
                                echo "<h1>No expired tasks</h1>";  
                            }else{
                                while($data = $result->fetch_assoc()){
                    ?>
                    <div class="task-container">
                        <a href="delete.php?id=<?php echo $data['ID_task'] ?>"><i class="fa-solid fa-trash fa-lg"></i></a>
                        <h3><?php echo "Status: ".$data['Status'] ?></h3>
                        <h3><?php echo $data['title'] ?></h3>
                        <p><?php echo $data['description'] ?></p>
                        <p><?php echo "Task expired at: ".$data['expiredate']?> [ <?php echo datecalc($data['expiredate'])?> day(s) ago] </p>
                    </div>
                    <?php }
                    } 
                    ?>
                </div>
        </div>
    </section>
</body>
</html>