<?php
require 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
    $pdostatement =$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result=$pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
</br>
            <div>
                <a href="http://localhost/todo/add.php" type="button" class="btn btn-success">Create New</a>
            </div>
</br></br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i =1; 
                    if($result){
                        foreach($result as $value){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $value['description']?></td>
                        <td><?php echo date('Y-M-d',strtotime($value['create_at']))?></td>
                        <td>
                            <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id']; ?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>