<?php

require 'config.php';


if($_POST){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement =$pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'" );
    $result =$pdostatement->execute();
    if($result){
        echo "<script>alert('New ToDo is Updated');window.location.href='index.php';</script>";
    }
    

}else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result= $pdostatement->fetchAll();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Edit New</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit ToDo</h2>
            <form class="" action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
                </div>
</br>
                <div class="form-group">
                    <label for="">Description</label>
                    </br>
                    <textarea name="description" class="form-control" id="" cols="88" rows="8"><?php echo $result[0]['description'] ?></textarea>
                </div>
</br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="UPDATE">
                    <a  href="index.php" class="btn btn-warning" name="" value="back">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>