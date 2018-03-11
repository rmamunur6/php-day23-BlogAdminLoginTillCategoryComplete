<?php
/**
 * Created by PhpStorm.
 * User: rmamu
 * Date: 11-Mar-18
 * Time: 10:02 AM
 */

namespace App\classes;
use App\classes\Database;


class Category
{
    public function saveCategoryInfo($data)
    {
        $sql="INSERT INTO categories(name,description,status) VALUES ('$data[category_name]','$data[category_description]','$data[status]')";
        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $message="Category Successfully Saved !!";
            return $message;
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function showAllCategoryInfo()
    {
        $sql="SELECT * FROM categories";
        if (mysqli_query(Database::dbConnection(),$sql))
        {
            $queryResult=mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteCategoryInfo($id){
        $sql="DELETE FROM categories WHERE id='$id'";
        if(mysqli_query(Database::dbConnection(),$sql))
        {
            $message="Category info Successfully Deleted !!";
            return $message;
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getCategoryInfoById($categoryId){
        $sql="SELECT * FROM categories WHERE id='$categoryId'";
        if (mysqli_query(Database::dbConnection(),$sql))
        {
            $queryResult=mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function updateCategoryInfo($data){
        $sql="UPDATE categories SET name='$data[category_name]',description='$data[category_description]',status='$data[status]' WHERE id='$data[id]'";
        if(mysqli_query(Database::dbConnection(),$sql))
        {
            header("Location:manage-category.php");
        }
        else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

}