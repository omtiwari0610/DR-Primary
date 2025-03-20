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
table{
    /* border-collapse:collapse; */
    width:100%;
    color:#d96459;
    font-family:monospace;
    font-size:25px;
    text-align:center;
}
th{
    background-color:red;
    color:white;
}
tr{background-color: white;}
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
        <table>
            <tr>
                <th>BID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>Final price</th>
            </tr>
            <?php
              include("connection.php");
              if (file_exists(__DIR__ . '/../failover.php')) {
                include('../failover.php');
            }
              if(isset($_POST['buy'])){
                $name = $_POST['name'];
                $category = $_POST['cat'];
                $description = $_POST['des'];
                $cost = $_POST['cost'];
                $expiry = $_POST['ED'];
                $img = $_POST['image'];
                $quantity = $_POST['quantity'];
            
                $select_bills = mysqli_query($conn,"SELECT * FROM bills WHERE name = '$name' and cost = '$cost'");
                 
                if($rows = mysqli_num_rows($select_bills)>0){
                    echo '<script>
                        window.location.href="cart.php";
                        alert("Product already added to your bill!!");
                        </script>';
                }
                else{
                $insert_med = mysqli_query($conn,"INSERT INTO bills(name,category,description,cost,expiry_dat,quantity) VALUES('$name','$category','$description','$cost','$expiry','$quantity')");
                }     
            }
             $sql = "SELECT * FROM bills"; 
             $result = mysqli_query($conn,$sql);
             $fprice = "SELECT quantity*cost AS total_price FROM bills";
             $result1 = mysqli_query($conn,$fprice);
             if($result -> num_rows>0){
               while($row = $result -> fetch_assoc()){
                 $total_price = $result1->fetch_assoc()["total_price"];
                 echo "<tr><td>".$row["BID"]."</td><td>".$row["name"]."</td><td>".$row["category"]."</td><td>".$row["description"]."</td><td>".$row["expiry_dat"]."</td><td>".$row["quantity"]."</td><td>".$total_price."</td>";
               }
             echo "</table>";
            }
          ?>
        </table>
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