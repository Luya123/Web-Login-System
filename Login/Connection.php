<?php 
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Email   =  $_POST['Email'];


//DataBase connection 
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
   $stmt = $conn->prepare("insert into registration(Username, Password, Email)
   values(?,?,?)");

   $stmt->bind_param("sss",$Username, $Password, $Email );
   $stmt->execute();
   echo "Registration Successfully...";
   $stmt->close();
   $conn->close();
}

?>