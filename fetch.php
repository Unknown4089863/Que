<?php
      $server="localhost";
      $username="root";
      $password="";
      $dbname="pulse_rate";

      $connect=mysqli_connect($server,$username,$password,$dbname);
      if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
      $fileName="";
$num= isset($_GET['sno'])?intval($_GET['sno']):1;
      $setsqlData="SELECT * FROM `upload` WHERE `sno`=$num";
      $res=$connect->query($setsqlData);
 if($res && $res->num_rows>0){
  $row=$res->fetch_assoc();

  $file=$row['file'];
$fileName=$row['filename'];
$arrFileType = [
  "jpg", "jpeg", "png", "gif", "bmp", "tiff", "webp", "svg", "heif", "heic"
];
$fileExtension=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));



$fileBase64=base64_encode($file);
$fileDataUri='data:.'.$fileExtension.';base64,'.$fileBase64;

  echo json_encode([
"status" => "success",
"heading" => htmlspecialchars($row['heading'],ENT_QUOTES),
"dbcontent" => htmlspecialchars($row['content'],ENT_QUOTES),
"CreaterEmail" => htmlspecialchars($row['email'],ENT_QUOTES),
"file" => $fileDataUri,
"fileName" => $fileName
  ]);
  }
  else{
    echo json_encode([
      "status"=>"fail"
        ]);
  }

  $connect->close();
    ?>