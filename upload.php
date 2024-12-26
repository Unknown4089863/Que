<?php
            if(isset($_POST['contentFormHeading']) && $_POST['contentFormHeading']!="" && isset($_POST['contentFormMsg']) && $_POST['contentFormMsg']!=""){
              $server="localhost";
              $username="root";
              $password="";
              $dbname="pulse_rate";

              $connect=mysqli_connect($server,$username,$password,$dbname);
              if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
              $fileName="";
              $heading=$_POST['contentFormHeading'];
              $content=$_POST['contentFormMsg'];
if(isset($_FILES['contentFormFile']) && $_FILES['contentFormFile']['error']==0){
    $fileName=$_FILES['contentFormFile']['name'];
    $fileTmp=$_FILES['contentFormFile']['tmp_name'];
    $file=file_get_contents($fileTmp);
    $file=$connect->real_escape_string($file);
    $email= isset($_GET['email'])?($_GET['email']):'';
    $setsqlData="INSERT INTO `upload`(`heading`,`content`,`email`,`file`,`filename`,`time`)VALUES('$heading','$content','$email','$file','$fileName',current_timestamp())";
}
else{
    $setsqlData="INSERT INTO `upload`(`heading`,`content`,`time`)VALUES('$heading','$content',current_timestamp())";
}
          
if($connect->query($setsqlData)===TRUE){
    echo "        <style>
            body {
                font-family: Arial, sans-serif;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0;
                background-color: #f4f4f9;
            }

            .container {
                text-align: center;
                background-color: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 60%;
                max-width: 600px;
            }

            h1 {
                color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Upload Data</h1>
            <h2>Swipe Right to Go Back &rightarrow;</h2>
        </div>
        <body>
    ";

               
               }else{              
echo '<body style="font-family: Arial, sans-serif; margin: 2rem; background-color: #f8f9fa; color: #333;">
    <h1 style="color: #dc3545;">File Upload Error</h1>
    <p style="font-size: 1.2rem;">File format not supported.</p>
    <p style="font-size: 1.2rem;">Image size is too large.</p>
    <p style="font-size: 1.2rem;">Content contains malicious code.</p>
</body>';
                           }

               $connect->close();

            }else{
                echo "ERROR :";
            }
            ?>