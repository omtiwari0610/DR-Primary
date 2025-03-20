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
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .navbar{
            background-color: maroon;
            color: white;
            height:10vh;
            text-align: center;
            padding-top: 5vh;
        }
        .card1{
            background-color:red;
            height:40vh;
            width:20vw;
            padding-top: 30vh;           
            margin-left: 10vw;
            color:white;
            border-radius: 20px;
            display: inline-block;
        }
        .card2{
            background-color:red;
            height:40vh;
            width:20vw;
            padding-top: 30vh;           
            margin-left: 10vw;
            color:white;
            border-radius: 20px;
            display: inline-block;
        }
        .card3{
            background-color: red;
            height:40vh;
            width:20vw;
            padding-top: 30vh;
            margin-left: 10vw;
            color:white;
            border-radius: 20px;
            display: inline-block;
        }
        h1{
            text-align: center;
        }
        a{
            text-decoration: none;
            color:white;
            
        }
        img{
            position:absolute;
            top:3vh;
            right:0vw;
            height:8vh;
            border-radius: 50px;
            cursor:pointer;
        }
        .content a{
            display:none;
            position: absolute;
            right:0.1vw;
            top : 11vh;
            color:black;
            background-color: white;
        }
        .logout:hover  .content a{
            display: block;
        }
        .logout{
            height:5vh;
            position: absolute;           
            top: 1vh;
            right:0vw;
            width: 4vw;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Customer</h1>
        <div class="logout">
        <img src="user.jpg">
        <div class="content">
            <a href="signin.php">LOGOUT</a>
        </div>
        </div>
    </div><br><br>
    <div class="card1"><h1><a href='search.php'>Search medicines</a></h1></div>
    <div class="card2"><h1><a href='cart.php'>Cart</a></h1></div>
    <div class="card3"><h1><a href='bills.php'>Bills</a></h1></div>  
</body>
</html>