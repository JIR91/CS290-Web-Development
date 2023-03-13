<?php
mysql_connect('localhost', 'DuckyGang', 'bROYU)211v[AJi6T') or die(mysql_error());
mysql_select_db('phplogin') or die(mysql_error());

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $emailid = $_POST['email'];

    if ($name==''){
        echo "<script>alert('Please enter a username.')</script>";
        exit();
    }
    if ($password==''){
        echo "<script>alert('Please enter a password.')</script>";
        exit();
    }
    if ($emailid==''){
        echo "<script>alert('Please enter an email address.')</script>";
        exit();
    }
    else{
        $query = "insert into user (name,password,email) values ('$name','$password','$emailid')";
        if (mysql_query($query)){
            echo "<script>alert('Registered Successfully!')</script>";
        }
    }
}
?>