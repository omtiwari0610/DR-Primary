
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type = "text/css">
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
table{
    /* border-collapse:collapse; */
    width:100%;
    color:#d96459;
    font-family:monospace;
    font-size:25px;
    text-align:center;
}
th{
    background-color:#588c7e;
    color:white;
}
tr{background-color: white;}
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
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>In-stock</th>
            </tr>
            <?php
              include("connection.php");
              if (file_exists(__DIR__ . '/../failover.php')) {
                include('../failover.php');
            }
             $sql = "SELECT * FROM medicines"; 
  $result = mysqli_query($conn,$sql);

  if($result -> num_rows>0){
    while($row = $result -> fetch_assoc()){
        echo "<tr><td>".$row["MID"]."</td><td>".$row["name"]."</td><td>".$row["category"]."</td><td>".$row["description"]."</td><td>".$row["cost"]."</td><td>".$row["expiry_dat"]."</td><td>".$row["quantity"]."</td><td>".$row["stock"];
    }
    echo "</table>";
  }
  else{
    echo "No entries found!";
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