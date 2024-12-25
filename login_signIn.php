<?php
$choose=0;
if(isset($_POST['login_btn'])){
    $choose=1;
}
if(isset($_POST['create_btn'])){
    $choose=2;
}
$passwd_length=true;
if(isset($_POST['apassword'])&&$_POST['apassword']==""){
    $passwd_length=false;
    $choose=2;
}
else if(isset($_POST['apassword'])&&isset($_POST['apassword'])){
    $password=$_POST['apassword'];
    if(strlen($password) <8){
        $passwd_length =false;
        $choose=2;
    }
}
$passwd_match=true;
if(isset($_POST['cpassword'])&&$_POST['cpassword']==""){
    $passwd_match=false;
    $choose=2;
}
else if(isset($_POST['cpassword'])&&isset($_POST['cpassword'])){
    $cpassword=$_POST['cpassword'];
    if($cpassword!==$password){
        $passwd_match =false;
        $choose=2;
    }
}

$mail=true;

if(isset($_POST['aemail'])){
    $a=$_POST['aemail'];
    if((str_contains($a,"@gmail.com"))||(str_contains($a,"@outlook.com"))){
        $mail=true;
    }else{
        $mail=false;
        $choose =2;
    }
}
$submit=false;
$aemail="";
$apassword="";
$cpassword="";
if(isset($_POST['cpassword'])||isset($_POST['apassword'])||isset($_POST['aemail'])){
if($passwd_length==true && $passwd_match==true && $mail==true &&  $_POST['aemail']!="" && $_POST['apassword']!="" && $_POST['cpassword']!="" ){
    $submit=true;
    }
    if($submit==true){
        $aemail="";
        $apassword="";
        $cpassword="";
    }else{
        $aemail=$_POST['aemail'];
        $apassword=$_POST['apassword'];
        $cpassword=$_POST['cpassword'];
    }
}
$dbsave=false;
if($submit==true){
    $server="localhost";
    $username="root";
    $password="";
    $dbname="pulse_rate";


    $connection=mysqli_connect($server,$username,$password,$dbname);
    if(!$connection){
        echo '<h1 style="display:flex;justify-content:center;align-items:center;padding:10% 10px;">Check Your connection! </h1>';
    }

$pemail=$_POST['aemail'];
$ppassword=$_POST['apassword'];


$sqlData= "INSERT INTO `login` (`email`, `password`,`time`) VALUES ('$pemail','$ppassword',current_timestamp())";

if($connection->query($sqlData)===true){
    $dbsave=true;
}else{
    echo "ERROR :";
}

$connection->close();
if($dbsave==false){
    $choose=2;
}
}

$n=0;
$checkDBpasswd=false;

if(isset($_POST['lemail']) && isset($_POST['lpassword'])){
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
      $sqlData="SELECT * FROM `login`  WHERE `email`='$email' AND `password`='$password'";
      $result=$con->query($sqlData);
      if($result->num_rows >0){
          $login_success=true;
        }else{
            $sqlMail="SELECT * FROM `login`  WHERE `email`='$email'";
        $res_mail=$con->query($sqlMail);
        if($res_mail->num_rows>0){
            $checkDBpasswd=true;
        }else{
            $checkDBpasswd=false;
            $choose=1;
            if($n>2){
                header("Location,index.php");
            }
            $n++;
        }
           
        }
      $con->close();
  }else{
    $n++;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_create_account</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            display: flex;
            width: 100%;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 40%;
            background-color:rgba(255, 255, 255,0.5);
            height: 400px;
            justify-content: center;
            align-items: center;
        }
        label{
            font-size: 22px;
            font-weight:550;
            margin: 20px;
        }
        .btn{
            width: 50%;
            padding:10px;
            margin: 10px;
            font-size: <?php if($choose==0){ echo '16px';}else{echo '14px';}?>;
            border: 1px solid black;
            border-radius:5px;
        }
        #img{
            width:100%;
            height:100vh;
            position: fixed;
            z-index:-1;
            filter: blur(1px);
        }
        input{
            width:70%;
            padding: 10px;
            margin: 10px;
            outline-color:black;
            border:1px solid black
        }
        #login_create_account{
display: <?php if($choose==0){ echo 'flex';}else{echo 'none';}?>;
        }
        #login{
display: <?php if($choose==1){ echo 'flex';}else{echo 'none';}?>;
        }
        #create_account{
display: <?php if($choose==2){ echo 'flex';}else{echo 'none';}?>;
        }
    </style>
</head>
<body>
    <img src="login_create_account.png" id="img">

    <form method="post" id="login_create_account">
        <label>Login/Create Account</label>
<button class="btn" name="login_btn">Login</button>
<button class="btn" name="create_btn">Create Account</button>
<?php if($dbsave==true){echo "<h3 style='color:green'>Account Created</h3>";}?>
    </form>

    <form method="post" id="login" action="login_entered.php">
        <input type="email" name="lemail" placeholder="Email">
        <input type="password" name="lpassword" placeholder="Password">
        <?php if($checkDBpasswd==false && $n>1){echo "<p style='color:red;text-align:center;'>Email or Password is worng </p>";$choose=1;}?>
        <button class="btn" name="loginPage">Login</button>
    </form>

    <form method="post" id="create_account">
        <input type="email" name="aemail"  value="<?php echo $aemail; ?>" placeholder="Email">
        <?php if($mail==false){echo "Enter valid mail ";} ?>
        
      <input  id="apassword" type="<?php if(isset($_POST['showPassword'])){echo "text";}else{ echo 'password';} ?>" name="apassword" value="<?php echo $apassword; ?>"  placeholder="Password">
      <button name="showPassword">See Password</button>
        <?php if($passwd_length==false){echo "Enter 8 digit password ";} ?>
        <input type="password" name="cpassword" value="<?php echo $cpassword; ?>"  placeholder="Password again">
        <?php if($passwd_length==true && $passwd_match==false){echo "Enter Same password ";} ?>
        <button class="btn">Create Account</button>
    </form>
        
</body>
</html>
