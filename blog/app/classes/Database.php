<?php
/**
 * Created by PhpStorm.
 * User: rmamu
 * Date: 10-Mar-18
 * Time: 10:04 PM
 */

namespace App\classes;


class Database
{
    public function dbConnection()
    {
        $hostName="localhost";
        $userName="root";
        $password="";
        $dbName="blog";
        $link=mysqli_connect($hostName,$userName,$password,$dbName);
        return $link;
    }

}