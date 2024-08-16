
<?php 
$username="root";
$servername="localhost";
$password="";
$dbname="tpweb";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("error connecting to database".$conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
  

$name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql="INSERT INTO login(username,email,passwordd,rool)Values('$name','$email','$password','$role')";
if($conn->query($sql)===TRUE){
    header("location:login.html");
    exit();
}else{
    header("location:ajouter.html?message=no");
}}


$conn->close();
?>