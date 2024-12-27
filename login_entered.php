<?php
$login_success=false;

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
        header("Location:index.php");
    }
    $con->close();
}
else{
     '<h2 style="display:flex;justify-content:center;align-items:center;padding:10% 10px;">Connection Fail! Check Your connection! </h2>';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Que</title>
  <style>
    #contentForm {
      width:50%;
      background-color:rgba(255,255,255,0.9);
      padding: 10px;
      width: 50%;
      border-radius: 5px;
      display:none;
      align-items:center;
      justify-content:center;
      border:3px solid grey;
      flex-direction:column;
      position: fixed;
      bottom: 20px;
      left:25%;
    }
    #contentFormHeading{
width:80%;
padding:10px;
margin:10px;
outline-color:black;
 border: 1px solid black;
}
#msg{
      width:80%;
      height:100px;
      padding:10px;
      margin:10px;
      outline-color:black;
       border: 1px solid black;
    }
    #uploadFile{
      width: 50%;
            padding:10px;
            margin: 10px;
            font-size:14px;
            border: 1px solid black;
            border-radius:5px;
    }
    .btn{
            width: 50%;
            padding:10px;
            margin: 10px;
            font-size:14px;
            border: 1px solid black;
            border-radius:5px;
        }
  </style>
</head>


<?php


?>

<body>
  <script>
    let $ = document;
    let $$ = $.body;
    function $1(a) { return $.createElement(a) }
    let $a = (parent, child) => { return parent.append(child) }
    let $p = (parent, child) => { return parent.prepend(child) }
    let $sa = (tag, key, value) => { return tag.setAttribute(key, value) }

    $sa($$, "style", "display:grid;grid-template-rows:15vh 83vh;background-color:rgb(110,110,110); <?php if($login_success==false){ echo 'display:none;';} ?>")

    let head = () => {
      let header = $1("header")
      $sa(header, "id", "header")
      $sa(header, "style", "display:grid;grid-template-columns:7% 65% 15%;align-items:center;gap:8%;margin:2% 5%")

      let logo = $1("img")
      $sa(logo, "id", "logo")
      $sa(logo, "src", "images/SOCIAL MEDIA 5.png")
      $sa(logo, "style", "width:100%;height:100%;border-radius:30%")
      $a(header, logo)

      let searchBar = () => {
        let searchDiv = $1("div")
        $sa(searchDiv, "id", "searchBar")
        $sa(searchDiv, "style", "height:60%;width:100%;display:flex;flex-direction:columns;border:1px solid black;")

        let logoSearch = () => {
          let div = $1("div")
          $sa(div, "id", "logoSearch")
          $sa(div, "style", "background-color:white;height:100%;font-size:1.5rem;text-align:center;padding-left:2%;padding-right:2%;line-height:5vh");
          div.innerText = "Q"
          return div
        }

        let searchInput = () => {
          let search = $1("input")
          $sa(search, "id", "search")
          $sa(search, "style", "width:100%;color:black;padding-left:5%;border:none;outline-color:black")
          $sa(search, "placeholder", "Search..")
          $sa(search, "name", "headSearch")
          return search;
        }

        $a(searchDiv, logoSearch())
        $a(searchDiv, searchInput())
        return searchDiv
      }
      $a(header, searchBar())
let login_option=$1("div");
$sa(login_option, "style", "position:fixed;right:1%;width:16%;font-weight:600;display:flex;flex-direction:column;")
let loginBtn = $1("button")
$sa(loginBtn, "id", "loginBtn")
$sa(loginBtn, "name", "login_signIn")
loginBtn.innerHTML = "<img style='border-radius:50%;width:3vh;height:3vh;align-self:center;margin-right:2%;margin-bottom:-4px;' src='images/user_profile_pic.png'><?php echo $email ; ?>"
$sa(loginBtn, "style", "font-weight:600;margin:2px;padding:5px;")
let logout=$1('button')
logout.innerHTML="LOGOUT";
$sa(logout, "style", "width:50%;font-weight:600;align-self:center;padding:5px;")
$sa(logout, "name", "logout");
$sa(logout, "onclick", 'window.location.href="index.php"');
    
      $a(login_option, loginBtn);
      $a(login_option, logout);
      $a(header, login_option);

      return header;
    }


    let MAIN = () => {
      let main = $1("div")
      $sa(main, "id", "main")
      $sa(main, "style", "display:grid;grid-template-columns:12% 70% 17%;")

      let Split1 = () => {
        let split1 = $1("div")
        $sa(split1, "id", "split1")
        $sa(split1, "style", "display:grid;margin-left:15%;")

        function sec1() {
          let section1 = $1("div")
          $sa(section1, "id", "split1Sec1")

          let line1 = $1("h3")
          line1.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >HOME</a>"
          $sa(line1, "onmouseover", "hoversplit1(this)")
          $sa(line1, "onmouseout", "unhoversplit1(this)")

          let line2 = $1("h3")
          line2.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >PROFILE</a>"
          $sa(line2, "onmouseover", "hoversplit1(this)")
          $sa(line2, "onmouseout", "unhoversplit1(this)")

          let line3 = $1("h3")
          line3.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >POPULAR</a>"
          $sa(line3, "onmouseover", "hoversplit1(this)")
          $sa(line3, "onmouseout", "unhoversplit1(this)")

          let line4 = $1("h3")
          line4.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >TOPICS</a>"
          $sa(line4, "onmouseover", "hoversplit1(this)")
          $sa(line4, "onmouseout", "unhoversplit1(this)")



          let arr = [line1, line2, line3, line4];
          arr.forEach(e => {
            $a(section1, e);
          })
          return section1;
        }

        function sec2() {
          let section2 = $1("div")
          $sa(section2, "id", "split1Sec2")

          let line1 = $1("h4")
          line1.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Web.dev</a>"
          $sa(line1, "onmouseover", "zoom(this)")
          $sa(line1, "onmouseout", "unzoom(this)")

          let line2 = $1("h4")
          line2.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >AI/ML</a>"
          $sa(line2, "onmouseover", "zoom(this)")
          $sa(line2, "onmouseout", "unzoom(this)")

          let line3 = $1("h4")
          line3.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >DSA</a>"
          $sa(line3, "onmouseover", "zoom(this)")
          $sa(line3, "onmouseout", "unzoom(this)")

          let line4 = $1("h4")
          line4.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Front End</a>"
          $sa(line4, "onmouseover", "zoom(this)")
          $sa(line4, "onmouseout", "unzoom(this)")

          let line5 = $1("h4")
          line5.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Back End</a>"
          $sa(line5, "onmouseover", "zoom(this)")
          $sa(line5, "onmouseout", "unzoom(this)")

          let line6 = $1("h4")
          line6.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Roadmaps</a>"
          $sa(line6, "onmouseover", "zoom(this)")
          $sa(line6, "onmouseout", "unzoom(this)")
          $sa(line6, "style", "display:none")
          line6.classList.add("seemore")
          let line7 = $1("h4")
          line7.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Coding</a>"
          $sa(line7, "onmouseover", "zoom(this)")
          $sa(line7, "onmouseout", "unzoom(this)")
          $sa(line7, "style", "display:none")
          line7.classList.add("seemore")

          let line8 = $1("h4")
          line8.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Data Science</a>"
          $sa(line8, "onmouseover", "zoom(this)")
          $sa(line8, "onmouseout", "unzoom(this)")
          $sa(line8, "style", "display:none")
          line8.classList.add("seemore")
          let line9 = $1("h4")
          line9.innerHTML = "<a href='index.php' style='text-decoration:none;color:inherit;' >Software Engineering</a>"
          $sa(line9, "onmouseover", "zoom(this)")
          $sa(line9, "onmouseout", "unzoom(this)")
          $sa(line9, "style", "display:none")
          line9.classList.add("seemore")

          let seeMore = $1("h6")
          seeMore.innerText = "ShowMore..";
          $sa(seeMore, "onclick", `SeeMore(this)`)
          $sa(seeMore, "style", "margin-top:-5%;color:blue;cursor:pointer")
          $sa(seeMore, "id", "seehide");
          seeMore.classList.add("ShowMore")


          let arr = [line1, line2, line3, line4, line5, line6, line7, line8, line9, seeMore];
          arr.forEach(e => {
            $a(section2, e);
          })
          return section2;
        }

        function sec3() {
          let section3 = $1("div")
          $sa(section3, "id", "split1Sec3")
          let line1 = $1("h3")
          line1.innerText = "Setting"
          let line2 = $1("h3")
          line2.innerText = "Help ?"
          let line3 = $1("h3")
          line3.innerText = "Others"
          let line4 = $1("h3")
          line4.innerText = "Policy"
          let arr = [line1, line2, line3, line4];
          arr.forEach(e => {
            $a(section3, e);
          })
          return section3;
        }

        let arr = [sec1(), sec2(), sec3()];
        arr.forEach(e => {
          $a(split1, e);
        })

        return split1;
      }

      let Split2 = () => {

        let split2 = $1("div")
        $sa(split2, "style", "overflow:auto;scrollbar-width:none")

        <?php
    $server="localhost";
    $username="root";
    $password="";
   $dbname="pulse_rate";
$max=0;
   $conn=mysqli_connect($server,$username,$password,$dbname);
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
  $maxSql="SELECT MAX(sno) AS max_sno FROM `upload`";
$result=$conn->query($maxSql);
if($result->num_rows>0){
$row=$result->fetch_assoc();
$max=$row['max_sno'];
}
$conn->close();
  ?>  

      async  function content(num){

      try{
        let response = await fetch(`fetch.php?sno=${num}`)
        let dataFetch = await response.json()
        file=""
 if(dataFetch.status=="success"){
   heading=dataFetch.heading;
  dbcontent=dataFetch.dbcontent;
  imgFile=dataFetch.file;
  fileName=dataFetch.fileName;
  CreaterEmail=dataFetch.CreaterEmail;
 }else{
  heading ="Fetch error";
dbcontent ="Fail to fetch";
fileName="error.jpg";
imgFile="ERROR";
CreaterEmail="";
 }
      }catch(error){
       
heading ="ERROR";
dbcontent ="Fail to fetch";
fileName="error.jpg";
imgFile="ERROR";
CreaterEmail="";
      }
      let divis = $1("div")
      $sa(divis, "style", "background-color:white;padding:.2% 1%;margin:2% 0px;");
      $sa(divis, "id", `Feed${num}`);
      let topic = $1("p");
      topic.innerHTML = `<div id="FeedContent${num}" style="max-height:400px;overflow:hidden;"><h1 style="text-align:center;">${heading}</h1>
      <p>${dbcontent}</p><img src=${imgFile} alt="${fileName}" style="width:90%;margin:5%"><center>${CreaterEmail}</center></div>`;
      $a(divis, topic);
      $a(divis, data("&#128077;", "100", "&#128228;", "200",num));
      return divis;
    }

 

    (async () => {
        for (let i =<?php echo $max; ?> ; i >=1 ; i--) {
            $a(split2, await content(i));
        }
    })(); 

      
        
        return split2;
      }

      let Split3 = () => {
        let split3 = $1("div")
        $sa(split3, "id", "split3")
        $sa(split3, "style", "display:grid;grid-template-rows:60vh 20vh;position:fixed;right:1%;width:16%")

        function sec1() {
          let section1 = $1("div")
          $sa(section1, "id", "split3Sec1")
          $sa(section1, "style", "whidth:100%;margin:0;background-color:white;overflow:auto;scrollbar-width:none")

          let top = $1("h5")
          top.innerText = "Following"
          $sa(top, "style", "margin-left:10%")


          let line1 = id("images/github.png","https://github.com/unknown4089863","Unknown4089863",5);
          let line2 = id("images/insta.png","https://www.instagram.com/99xyz100/","99xyz100",5);

          let arr = [top, line1, line2];
          arr.forEach(e => {
            $a(section1, e);
          })


          return section1;
        }

        function sec2() {
          let section2 = $1("div")
          $sa(section2, "id", "split3Sec2")

          let aboutUs = $1("h4")
          aboutUs.innerHTML = "<a href='about.html' style='text-decoration:none;color:white;font-weight:900' >About Us</a>"

          let contactUs = $1("h4")
          contactUs.innerHTML = "<a href='Contact form/contact.php' style='text-decoration:none;color:white;font-weight:900' >Contact Us</a>"

          let links = $1("div")
          $sa(links, "style", "display:grid;grid-template-columns:50% 50% ;")
          links.innerHTML = `
  
  <button name="addContentForm" id="addContentForm" onclick="showContentForm()" style="width:100%;height:calc(2vh + 2vw);border-radius:5px;background-color:white;font-size:25px;font-weight:600;align-text:center;align-self:center;">+</button>
  <p style="margin:5px;color:white;">Click Here to Upload Content</p>`

          let arr = [aboutUs, contactUs, links];
          arr.forEach(e => {
            $a(section2, e);
          })
          return section2;
        }


        let arr = [sec1(), sec2()];
        arr.forEach(e => {
          $a(split3, e);
        })

        return split3;
      }

      $p(main, Split3())
      $p(main, Split2())
      $p(main, Split1())
      return main;
    }
    let contentFormPage=()=>{
            let contentForm=$1("form");
            $sa(contentForm,"id","contentForm")
            $sa(contentForm,"method","post");
            $sa(contentForm,"action","upload.php?email=<?php echo $_POST['lemail'];?>");
            $sa(contentForm,"enctype","multipart/form-data");
        
            contentForm.innerHTML=`<input type="text" id="contentFormHeading" name="contentFormHeading" placeholder="Add Heading" required>
<textarea id="msg" name="contentFormMsg" placeholder="Content Detail Here" required ></textarea>
<input id="uploadFile" type="file" name="contentFormFile"><button class='btn'>Upload</button>`
            $a($$,contentForm);
          }
contentFormPage();
    $p($$, MAIN());
    $p($$, head());


let contentFormNum=1;

function showContentForm(){
let addContentForm=$.getElementById("addContentForm");
 let contentForm=$.getElementById("contentForm");
            if(contentFormNum==1){
contentForm.style.display="flex";
contentFormNum=0;
addContentForm.innerText="-";
}else{
  contentForm.style.display="none";
  contentFormNum=1;
  addContentForm.innerText="+";
            }
          }



    function hoversplit1(element) {
      $sa(element, "style", "color:white")
    }
    function unhoversplit1(element) {
      $sa(element, "style", "color:black")
    }
    function zoom(element) {
      element.style.fontSize = "18px";
      element.childNodes.forEach((e) => {
        e.style.backgroundColor = "white";
        e.style.border = "1px solid black";
        e.style.borderRadius = "8px";
        e.style.padding = "2%";
      })
      element.style.width = "150%"
    }
    function unzoom(element) {
      element.style.fontSize = "16px";
      element.childNodes.forEach((e) => {
        e.style.backgroundColor = "rgb(110,110,110)";
        e.style.border = "0";
        e.style.padding = "0px"

      })
    }
    function SeeMore(element) {
      if (element.classList.contains("ShowMore")) {
        let select = $.querySelectorAll(".seemore");
        select.forEach((e) => {
          e.style.display = "block"
        })
        element.innerText = "ShowLess..";
        element.classList.remove("ShowMore")
        element.classList.add("ShowLess")

      }
      else {
        let select = $.querySelectorAll(".seemore");
        select.forEach((e) => {
          e.style.display = "none"
        })
        element.innerText = "ShowMore..";
        element.classList.add("ShowMore")
        element.classList.remove("ShowLess")

      }
    }
    function id(img,link,User,followers) {
      let line1 = $1("a");
      $sa(line1,"href",`${link}`)
      let imgUrl = img
      line1.innerHTML = `<img style='border-radius:50%;border:1px solid blue;width:5vh;height:5vh;margin-right:10%' src='${imgUrl}'>`
      $sa(line1, "style", "margin-left:10%;display:flex;flex-direction:row;height:10vh;font-weight:900")
      let divtag = $1('div')
      $sa(divtag, "style", "display:flex;flex-direction:column;");
      let username = $1("p")
      $sa(username, "style", "line-height:1%;font-size:13px;color:black; text-decoration: none;")
      username.innerText = User
      let follower = $1("p")
      $sa(follower, "style", " line-height: 1%;font-size:13px;color:black; text-decoration: none;")
      follower.innerText = "Follower : "+followers
      $a(divtag, username)
      $a(divtag, follower)
      $a(line1, divtag)

      return line1
    }
    function content(text) {
      let divis = $1("div")
      $sa(divis, "style", "background-color:white;padding:.2% 1%;margin:2% 0px;");
      let topic = $1("p");
      topic.innerHTML = text;
      $a(divis, topic);
      $a(divis, data("&#128077;", "100", "&#128228;", "200"));
      return divis;
    }
    function data(img1, num1, img2, num2,numSno) {
      let data = $1("div");
      $sa(data, "style", "display:flex;flex-direction:row;flex-grow:1;justify-content:space-evenly;align-items:flex-end;line-height:50%");

      let CreaterUsername=$1('div');
      $sa(CreaterUsername, "style", "align-self:center;");
      CreaterUsername.innerHTML=`<img style='border-radius:50%;width:3vh;height:3vh;' src='images/user_profile_pic.png'>`
      let createrMail=$1('b');
      createrMail.innerText=CreaterEmail;
      $sa(createrMail, "style", "position:relative;bottom:1vh;margin:8px;");
      $a(CreaterUsername,createrMail);


      let likes = $1('div');
      $sa(likes, "style", "display:flex;flex-direction:row;");
      let imglike = $1("p");
      imglike.innerHTML = img1
      let count1 = $1('b');
      $sa(count1, "style", "align-self:center")
      count1.innerText = num1
      $a(likes, imglike);
      $a(likes, count1);
      
      let share = $1('div');
      $sa(share, "style", "display:flex;flex-direction:row;");
      let imgshare = $1("p");
      imgshare.innerHTML = img2
      let count2 = $1('b');
      $sa(count2, "style", "align-self:center")
      count2.innerText = num2
      $a(share, imgshare);
      $a(share, count2);
      

      let threedot = $1("div")
      threedot.innerHTML = `<p>...</p>`
      $sa(threedot, "style", "transform: rotate(90deg);letter-spacing: 1px;font-weight:800")
      
let readMore=$1('button');
readMore.innerHTML="Read More";
$sa(readMore,"id",`readMoreLess${numSno}`)
$sa(readMore,"style",'color:red;align-self:center')
$sa(readMore,"onclick",`readMoreContent(${numSno})`)


$a(data, CreaterUsername);
$a(data, likes);
$a(data, share);
$a(data, threedot);
$a(data, readMore);

      return data;
    }


    
let readNum=1;
function readMoreContent(num){

if(readNum==1){
topic=$.getElementById(`FeedContent${num}`);
$sa(topic,"style","overflow:normal;")
let btn=$.getElementById(`readMoreLess${num}`);
btn.innerText="Show Less";
readNum=0;
}else{
  topic=$.getElementById(`FeedContent${num}`);
  $sa(topic,"style","max-height:400px;overflow:hidden;")
  let btn=$.getElementById(`readMoreLess${num}`);
  btn.innerText="Read More";
  readNum=1;
}
}


  </script>
</body>

</html>
