<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Que|Admin</title>
    <style>
      * {
        padding: 0;
        margin: 0;
      }
      body {
        width: 100%;
        height:100vh;
  margin: 0;
  padding: 0;
  font-size: 1vw;
  font-family: monospace, monospace;
}

      .container {
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items:center;
        flex-direction: column;
      }
      .table {
        margin-top:5vw;
        border-collapse: collapse;
        width: 90%;
      }

      .table th{
          padding: 10px;
        }
        .table td{
            padding: 10px;
         max-width:15vw;
        word-wrap:break-word; 
    }
    .table td a{
        text-decoration:none;
        color:black;
        font-weight:600;
    }
    #msg{
        max-width:35vw;
    }
    .table td p{
        max-height:15vh;
        overflow:auto;
        scrollbar-width:none;
        word-wrap:break-word;
      }

#img{
  position: fixed;
  width: 100%;
  z-index: -1;
  opacity: 0.7;
}
      .loginPage{
        width: 100%;
        margin: auto;
        display: flex;
        height:90vh;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      
      form {
        background-color: rgba(255, 255, 255, 0.69);
        padding: 10px;
        width: 50%;
        height:50%;
        display: flex;
        flex-direction: column;
      }
      form h2{
        text-align: center;
        margin:20px;
            }
      input {
        margin: 15px;
        font-size: 16px;
        padding: 15px;
      }
      .btnLogin {
        background-color: rgb(188, 41, 41);
        color: white;
        font-size: 16px;
        margin: 10px;
        padding: 15px;
        width: 30%;
        align-self: center;
        border-radius:8px;
      }
      @keyframes active {
  0% {
    padding: 0.5vw;
    border-top: 1px solid red;
  }

  25% {
    padding: 0.5vw;
    border-right: 1px solid red;
  }

  50% {
    padding: 0.5vw;
    border-bottom: 1px solid red;
  }

  75% {
    padding: 0.5vw;
    border-left: 1px solid red;
  }
}
.active {
  animation: active 2s linear 0s infinite normal;
}
header {
  background-color: rgb(51, 48, 48);
  height: 5vw;
  position: fixed;
  width: 100%;
  display: flex;
  font-family: monospace, monospace;
  font-size: 1.05vw;
  z-index: 1;
}
header nav {
  display: flex;
  flex-grow: 1;
}
header nav>a {
  flex-grow: 4;
  text-decoration: none;
  font-size: 1.2vw;
  display: flex;
  justify-content: center;
  color: azure;
}
header nav>a h1 {
  align-self: center;
}
header nav ul {
  flex-grow: 6;
  display: flex;
  align-items: center;
}
header nav ul li {
  flex-grow: 1;
  list-style-type: none;
}
header nav ul li a {
  text-decoration: none;
  color: white;
}
header nav ul #li1 {
  margin-left: 20vw;
  display: inline-block;
}
header nav ul #li6 {
  margin-right: 5vw;
}
header li>a:hover {
  background-color: red;
  padding: 0.5vw;
  border: 2px solid red;
  border-radius: 10px;
}

    </style>
  </head>
  <body>
  <header>
        <nav>
            <a href="index.html">
                <h1>Que</h1>
            </a>
            <ul>
                <li><a  id="li1" href="../index.php">Home</a></li>
                <li><a href="../about.html">About us</a></li>
                <li><a href="../login_signIn.php">Login/Create Account</a></li>
                <li><a id="li6" href="contact.php">Contact</a></li>
                <li><a  class="active" id="li6" href="admin.php">Admin</a></li>
            </ul>
        </nav>
    </header>
      <?php

if(isset($_POST['user']) &&$_POST['user']=="admin@amit.com" && isset($_POST['passwd'])&& $_POST['passwd']=="amit@admin"){
  $server="localhost";
  $username="root";
  $password="";
  $dbname="pulse_rate";
    
    $con=mysqli_connect($server,$username,$password,$dbname);
    if(!$con){
        echo '<h1 style="display:flex;justify-content:center;align-items:center;padding:10% 10px;">Check Your connection! </h1>';
    }
    
    $sqlData="SELECT * FROM contact  ORDER BY sno  DESC";
    $res=$con->query($sqlData);
    if($res->num_rows > 0){     
       echo '<div class="container">';
          echo '<table class="table" border= "1px solid black";>
          <tr>
          <th>S NO.</th>
          <th>Name</th>
          <th>age</th>
          <th>gender</th>
          <th>E-Mail</th>
          <th>Phone No</th>
          <th>Message</th>
          <th>Time</th>';     
           while($row=$res->fetch_assoc()){
            echo "<tr>";
               echo "<td>".$row['sno']."</td>";
               echo "<td><p>".htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8')."</p></td>";
               echo "<td>".$row['age']."</td>";
               echo "<td><p>".htmlspecialchars($row['gender'],ENT_QUOTES,'UTF-8')."</p></td>";
               echo "<td><a href='mailto:".$row['email']."'>".htmlspecialchars($row['email'],ENT_QUOTES,'UTF-8')."</a></td>";
               echo "<td><a href='tel:".$row['phone']."'>".htmlspecialchars($row['phone'],ENT_QUOTES,'UTF-8')."</a></td>";
               echo "<td id='msg'><p>".htmlspecialchars($row['other'],ENT_QUOTES,'UTF-8')."<p></td>";
               echo "<td>".$row['time']."</td>";
            echo "</tr>";                 
            }
            echo '</div>';
        }else{
            echo "Error";
        }
    }else{
        echo '<div class="loginPage" >
      <img src="login.png" id="img">
      <form method="post">
          <h2>Login Page</h2>
          <input type="text" id="user" name="user" placeholder="Username" />
          <input
          type="password"
          id="passwd"
          name="passwd"
          placeholder="Password"
          />
          <button class="btnLogin">Login</button>
          </form>
          </div>';
    }
        ?>
  </body>
</html>
