<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];



//DataBase connection 
$conn = new mysqli("localhost","root","","test");

if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

else{
    $stmt = $conn->prepare("select * from  registration where Username = ?");
    
 
    $stmt->bind_param("s",$Username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

   if($stmt_result->num_rows > 0){
         $data = $stmt_result->fetch_assoc();  

         if($data['Password'] === $Password){
            echo "<h2> Login Successfully</h2>";
         }
         else{
            echo "<h2> Invalid Username Or Password</h2>";
         }
   }
  
   else{
       echo "<h2> Invalid Username Or Password</h2>";
   }


 }

?>



