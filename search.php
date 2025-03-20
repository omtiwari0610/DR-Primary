<?php
include("connection.php");
if (file_exists(__DIR__ . '/../failover.php')) {
    include('../failover.php');
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
    background-color: maroon;
}
ul li{
   list-style: none;
   display: inline-block;
}
ul li a{
    display: inline-block;
    text-align: center;
    width:33.1vw;
    height:10vh;
}
i{
    position:relative;
    top:4vh;
    color:white;
}
.active {
  background-color: red; /* Change color for active item */
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
.searchbar{
    display: inline-block;
    margin: 0vh 0vw 0vh 10vw;
    width:70vw;
    height:5vh;
    border-radius: 10px;
}
.searchbtn{
    display:inline-block;
    width:5vw;
    height:5vh;
    border-radius:10px;
    cursor:pointer;
    background-color:red;
    color:white;
}
.flayout{
    display:inline-block;
    width:30vw;
    margin: 0 0 0 2vw;
    text:align:center;
    
}
.cardpic{
    height:30vh;
    width:20vw;
    position:relative;
    top:2vh;
    left:5vw;
}
.box{
    position:relative;
    margin: 5vh 0vw 0vw 0vw;
    display:inline-block;
    width:30vw;
    height:60vh;
    border:2px solid black;
    background-color:white;
    border-radius:20px;
}
.btn{
    background-color:red;
    color:white;
    position:relative;
    top:3vh;
    bottom:3vh;
    left:10vw;
    width:10vw;
    cursor:pointer;
    font-family:monospace;
    border-radius: 20px;
    height: 5vh;

}
.details{
    position:relative;
    left:2vw;
    top:4vh;
    font-family:monospace;
    font-size:15px;
}
.prompt{
    text-align:center;
}
</style>
<body>
    <div class="navbar">
        <ul>
            <li><a  href = "search.php"><i class="fa-solid fa-magnifying-glass">  Search medicines </i></a></li>
            <li><a href = "cart.php"><i class="fa-solid fa-cart-shopping"> Cart </i></a></li>
            <li><a href = "bills.php"><i class="fa-solid fa-file-invoice"> Bills </i></a></li>
        </ul>
   </div>
        <div class="logout">
            <img src="user.jpg">
            <div class="content">
                <a href="signin.php">LOGOUT</a>
            </div>
        </div>
        <br><br>
        <form  action = "search.php" method = "POST" enctype="multipart/form-data">
         <input type = "search" name = "input" class = "searchbar" placeholder="  Search medicine by name" >
         <input type = "submit" name = "search1" class = "searchbtn" value = "Search">
        </form><br><br>
        <?php
        if(isset($_POST['search1'])){
            $input = $_POST['input'];
            
            $sql = "SELECT * from medicines where medicines.name = '$input'";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
        
            if($count>0){
              while($fetch_med = mysqli_fetch_assoc($result)){
            ?>
            <form class = "flayout" action = "cart.php" method = "POST" enctype="multipart/form-data">
                <div class = "box">
                    <img class = "cardpic" src = "upload/<?php echo $fetch_med['Image']; ?>">
                    <div class = "details">
                      <div><h3 style="display: inline;">Name:</h3><?php echo $fetch_med['name']; ?></div> <br>
                      <div><h3 style="display: inline;">Quantity:</h3><?php echo $fetch_med['quantity']; ?></div> <br>
                      <div><h3 style="display: inline;">Expiry Date:</h3><?php echo $fetch_med['expiry_dat']; ?></div> <br>
                      <div><h3 style="display: inline;">Cost:</h3><?php echo $fetch_med['cost']; ?></div><br>
                    </div>
                    <input  type = "hidden" name = "name" value = "<?php echo $fetch_med['name'];?>">
                    <input  type = "hidden" name = "cat" value = "<?php echo $fetch_med['category'];?>">
                    <input  type = "hidden" name = "des" value = "<?php echo $fetch_med['description'];?>">
                    <input  type = "hidden" name = "cost" value = "<?php echo $fetch_med['cost'];?>">
                    <input  type = "hidden" name = "ED" value = "<?php echo $fetch_med['expiry_dat'];?>">
                    <input  type = "hidden" name = "quan" value = "<?php echo $fetch_med['quantity'];?>">
                    <input  type = "hidden" name = "image" value = "<?php echo $fetch_med['Image'];?>">
                    <input  type = "submit" class = "btn" value = "ADD TO CART" name = "cart">
                </div>
            </form>
            <?php
              }
            }
            else{
                ?><div class = "prompt"><?php echo "NO MATCHES FOUND!!";?></div>
            <?php  
            };
        };
        ?>
        <script src="https://kit.fontawesome.com/518283c99e.js" crossorigin="anonymous"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                 var currentLocation = window.location.pathname;
                 currentLocation = currentLocation.replace(/^\/+|\/+$/g, '');
                 console.log("Current Location:", currentLocation);
                 var navLinks = document.querySelectorAll(".navbar ul li a");
                 navLinks.forEach(function(navLink) {
                     var linkHref = navLink.getAttribute("href");
                     linkHref = "a/" + linkHref; 
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