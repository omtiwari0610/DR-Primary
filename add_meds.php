<?php
  include("connection.php");
  if (file_exists(__DIR__ . '/../failover.php')) {
    include('../failover.php');
}
  if(isset($_POST['submit'])){
    
    $name = $_POST['Name'];
    $category = $_POST['Cat'];
    $description = $_POST['Description'];
    $cost = $_POST['Cost'];
    $expiry = $_POST['ED'];
    $stock = $_POST['stock'];
    $img = $_FILES['image']['name'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO medicines(name,category,description,cost,expiry_dat,stock,Image,quantity) VALUES('$name','$category','$description','$cost','$expiry','$stock','$img','$quantity')";
    $query_run = mysqli_query($conn,$sql);
    if($query_run){
        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".$_FILES["image"]["name"]);

    }
  }
  else{
    if(isset($_POST['submit1'])){
        $name = $_POST['Name'];
        $category = $_POST['Cat'];
        $description = $_POST['Description'];
        $cost = $_POST['Cost'];
        $expiry = $_POST['ED'];
        $quantity = $_POST['quantity'];
        $stock = $_POST['stock'];

        $sql = "DELETE FROM medicines WHERE name = '$name' AND category = '$category' AND description = '$description' AND cost = '$cost' AND expiry_dat = '$expiry' AND quantity = '$quantity' AND stock = '$stock'";
        mysqli_query($conn,$sql);
   }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
*{
        margin: 0;
        padding: 0;
}
body{
        background-color: rgb(232, 231, 231);
}
.navbar{
    height:10vh;
    width:100vw;
    background-color: green;
}
ul li{
   list-style: none;
   display: inline-block;
}
ul li a{
    display: inline-block;
    text-align: center;
    width:33vw;
    height:10vh;
}
i{
    position:relative;
    top:3vh;
    color:white;
}
.active {
  background-color: #59e015; /* Change color for active item */
}
img{
    position:absolute;
    top:1vh;
    right:0vw;
    height:8vh;
    border-radius: 50px;
    cursor:pointer;
}
.content a{
    text-decoration: none;
    display:none;
    position: absolute;
    right:0.1vw;
    top : 9vh;
    color: black;
    background-color: white;
}
.logout:hover  .content a{
    display: block;
}
.logout{
    height:5vh;
    position: absolute;           
    top: 0vh;
    right:0vw;
    width: 4vw;
}
.flayout{
    font-family:monospace;
    font-size:12px;
    background-color: white;
    /* border:2px solid black; */
    position:relative;
    left:33vw;
    width:33vw;
    border-radius: 10px;
    height:90vh;
}
h1{
    text-align: center;
}
h3{
    margin:0vh 2vw;
}
input{
    margin:2vh 2vw ;
    width: 29vw;
    height:2.5vh;
}
.add{
    display:inline-block;
    width:10vw;
    background-color: #59e015;
    color:white;
    border:none;
    cursor: pointer;
    position: relative;
    left:4vw;
    height:5vh;
}
.del{
    display:inline-block;
    width:10vw;
    background-color: #e01515;
    color:white;
    border:none;
    cursor: pointer; 
    position:relative;
    left:1vw;
    height:5vh;
}
</style>
<body>
    <div class="navbar">
        <ul>
            <li><a  href = "add_meds.php"><i class="fa fa-wrench" aria-hidden="true" >  Add/delete medicines </i></a></li>
            <li><a href = "view.php"><i class="fa-solid fa-eye">  View medicines </i></a></li>
            <li><a href = "update.php"><i class="fa-solid fa-pen-nib">  Update medicines </i></a></li>
        </ul>
        <div class="logout">
            <img src="user.jpg">
            <div class="content">
                <a href="signin.php">LOGOUT</a>
        </div>
        </div>
        <br><br>
        <form class = "flayout" action="add_meds.php" method = "POST" enctype="multipart/form-data">
            <h1>Add/Delete Medicines</h1><br><br>
            <div class="name">
              <h3>Name</h3>
              <input name = "Name" required>
            </div>
            <div class="cat">
              <h3>Category</h3>
              <input name = "Cat" required>
            </div>
            <div class="descrip">
              <h3>Description</h3>
              <input name = "Description" required>
            </div>
            <div class="cost">
              <h3>Cost</h3>
              <input name = "Cost" required>
            </div>
            <div class="edate">
              <h3>Expiry Date</h3>
              <input name = "ED" required>
            </div>
            <div class="quan">
              <h3>In-Stock</h3>
              <input name = "stock" required>
            </div>
            <div class="quan">
              <h3>Quantity</h3>
              <input  name = "quantity" required>
            </div>
            <div class="quan">
              <h3>Image</h3>
              <input type = "file" name = "image">
            </div>
            <div class="button">
                <input type = "submit"  class="add" name = "submit" value="Add medicine">
                <input type = "submit"  class="del" name = "submit1" value="Delete medicine">
            </div>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/518283c99e.js" crossorigin="anonymous"></script>
    <script>
       document.addEventListener("DOMContentLoaded", function() {
            var currentLocation = window.location.pathname;
            console.log("Current Location:", currentLocation);
            var navLinks = document.querySelectorAll(".navbar ul li a");
            navLinks.forEach(function(navLink) {
                var linkHref = navLink.getAttribute("href");
                linkHref = "/a/" + linkHref; 
                console.log("Link Href:", linkHref);
                if (linkHref === currentLocation) {
                    console.log("Match Found!");
                    navLink.classList.add("active");
                }
            });
        });
    </script>
</body>
</html>
