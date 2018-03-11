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
                                <select>
                                    <option>-- Select Category Name --</option>
                                    <option>Category one</option>
                                    <option>Category two</option>
                                    <option>Category three</option>
                                    <option>Category four</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Short Description</label>
                            <div class="col-sm-9">
                                <input type="text" name="short_description" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio"  name="status" value="1" > Published
                                <input type="radio"  name="status" value="2" > Unpublished
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Blog Info</button>
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