<?php
if(isset($_POST['user']) && isset($_POST['password'])){
  $server="localhost";
  $username="root";
  $password="";
  $dbname="pulse_rate";
    
    $con=mysqli_connect($server,$username,$password,$dbname);
    if(!$con){
        echo '<h1 style="display:flex;justify-content:center;align-items:center;padding:10% 10px;">Check Your connection! </h1>';
    }
    $email=$_POST['lemail'];
    $password=$_POST['lpassword'];
    $sqlData="SELECT * FROM `login`  WHERE `email`=`$email` AND `password`=`$password`";
    $result=$con->query($sqlData);
    if($result->num_rows >0){
        echo 'password match';
    }else{
        echo 'password not match';
    }

    $con->close();
}
        ?>
  </body>
</html>
