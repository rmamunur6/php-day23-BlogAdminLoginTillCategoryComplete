<?php
session_start();
if(isset($_SESSION['id'])==null){
    header('Location:index.php');
}

require_once '../vendor/autoload.php';
$login=new \App\classes\Login();
if(isset($_GET['logout'])){
    $login->adminLogout();
}

$categoryId=$_GET['id'];
$category=new \App\classes\Category();
$queryResult=$category->getCategoryInfoById($categoryId);
$categoryInfo=mysqli_fetch_assoc($queryResult);

if (isset($_POST['btn']))
{
    $updateQueryResult=$category->updateCategoryInfo($_POST);
}

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
        <div class="col-sm-8 mx-auto">
            <div class="card">

                <div class="card-body">



                    <form action="" method="post">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="category_name" value="<?php echo $categoryInfo['name']?>" >
                                <input type="hidden" class="form-control"  name="id" value="<?php echo $categoryInfo['id']?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="category_description" ><?php echo $categoryInfo['description']?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio"  name="status" <?php if($categoryInfo['status']==1) {echo ' checked ';} ?> value="1" > Published
                                <input type="radio"  name="status" <?php if($categoryInfo['status']==0) {echo ' checked ';} ?> value="0" > Unpublished
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block" onclick="return confirm('Are You sure want to Update this Category Info?')">Update Category Info</button>
                            </div>
                        </div>
                    </form>
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