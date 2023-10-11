<?php
require 'config.php';

if($_POST){
    $title=$_POST['title'];
    $desc=$_POST['description'];

    $sql="INSERT INTO todo(title,description)VALUES (:title , :description)";
    
    $pdostatement =$pdo->prepare($sql);
    $result=$pdostatement->execute(
        array(
            ':title'=>$title,
            ':description'=>$desc
        )
    ); 
    if($result){
        echo "<script>alert('New ToDo is Added');window.location.href='index.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Create New</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo</h2>
            <form class="" action="add.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
</br>
                <div class="form-group">
                    <label for="">Description</label>
                    </br>
                    <textarea name="description" class="form-control" id="" cols="88" rows="8"></textarea>
                </div>
</br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="SUBMIT">
                    <a  href="index.php" class="btn btn-warning" name="" value="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>