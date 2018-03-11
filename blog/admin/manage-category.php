<?php
session_start();
if(isset($_SESSION['id'])==null){
    header('Location:index.php');
}

require_once '../vendor/autoload.php';
$login=new \App\classes\Login();
if(isset($_GET['logout'])) {
    $login->adminLogout();
}
$message="";
$category=new \App\classes\Category();
if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $message=$category->deleteCategoryInfo($id);
}
$queryResult=$category->showAllCategoryInfo();




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<?php include 'includes/menu.php'?>

<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">

                <div class="card-body">
                    <hr>
                    <h4 align="center" style="color: red"><?php echo $message;?></h4>
                    <hr>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($categoryInfo=mysqli_fetch_assoc($queryResult)){?>

                        <tr>

                            <th><?php echo $categoryInfo['id']?></th>
                            <td><?php echo $categoryInfo['name']?></td>
                            <td><?php echo $categoryInfo['description']?></td>
                            <td>
                                <?php if ($categoryInfo['status']==1) {echo ('Published');} else echo 'Unpublished' ?>
                            </td>
                            <td>
                                <a href="category-edit.php?id=<?php echo $categoryInfo['id']?>" >Edit</a>
                                <a href="?delete=true&id=<?php echo $categoryInfo['id']?>" onclick="return confirm('Are You sure want to Delete this Student Info?')">Delete</a>
                            </td>

                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>