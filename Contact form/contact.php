<?php
$insert=false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";
$dbname = "pulse_rate";

$con=mysqli_connect($server,$username,$password,$dbname);
if(!$con){
    die("Connection to Database Failed due to".mysqli_connect_error());
}


$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['other'];
    $sql= "INSERT INTO `contact` (`name`, `age`, `gender`, `email`, `phone`, `other`, `time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

if($con->query($sql)===true){
$insert=true;
}
else{
    echo "Error : $sql <br> $con->error";
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Que | Contact</title>
    <link rel="stylesheet" href="contact.css" >
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <img class="img" src="image.png">
    <div class="container">
        <h3>Contact Us</h3>
        <p>Write Any <b>Query</b>, Give your valuable <b>feedback</b> Here</p>
    <?php
    if($insert==true){
        echo "<p class='submitMsg'>Thanks for Submitting your form. we are happy to see you joining us in Us trip </p>";
    }
    ?>
    <form method="post" action="admin.php">
<button class="btn" style="position: fixed;top: 10px;right: 20px;">Admin</button>
 </form>    
    <form  method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
            <input type="text" name="age" id="age" placeholder="Enter Your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter Your email" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter Your phone" required>
<textarea name="other" id="other" cols="30" rows="8" placeholder="Enter Another Info here"></textarea>
<button class="btn">Submit</button>
        </form>
    
    </div>
    <script src="script.js"></script>
   
</body>
</html>


