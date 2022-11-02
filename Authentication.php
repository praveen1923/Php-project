<?php
include('modl.php');
$conn = mysqli_connect('localhost', 'root', 'Praveen@123', 'nuro');
$name = $_POST['name'];
$password = $_POST['password'];
$name = stripcslashes($name);
$password= stripcslashes($password);
$name = mysqli_real_escape_string($conn , $name);
$password = mysqli_real_escape_string($conn, $password);

$sql = "select *from odd where name = '$name' and password= '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count ==1){
    echo "<a href='logg1.php'> Login successful </a>";
}
else{
    echo "<h1> Login failed. Invalid name or password.</h1>";
}
?>

