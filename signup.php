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
        body{
            background-color: rgba(128, 255, 0, 0.368);
        }
        .container{
            border:1px solid;           
            position:relative;
            top:25vh;
            height:50vh;
            left:33vw;
            width:33vw;
            border-radius: 20px;
            background-color: white;

        }     
        h1{
            position: relative;
            left:13vw;
        }
        .email{
            width:28vw;
            position: relative;
            left:2vw;
            height:4vh;
            border-radius: 20px;
        }
        .pass{
            width:28vw;
            position: relative;
            left:2vw; 
            height:4vh;
            border-radius: 20px;
        }
        .pass1{
            width:28vw;
            position: relative;
            left:2vw; 
            height:4vh;
            border-radius: 20px;
        }
        .signup{
            position: absolute;
            bottom: 5vh;
            left:9vw;
            height:4vh;
            width:15vw;
            color:white;
            background-color: blue;
            border-radius: 10px;
        }  
        /* form{
            height:33vh;
        } */
        .txt{
            position: relative;
            left:2vw;
            height:10vh;
            font-size: 4vh;
        }
        .three{
            position:absolute;
            top:18vh;
        }
    </style>
</head>
<body>
    <div class="container" >
        <form action = "new.php" method = "POST">
            <div class="header"><h1>Sign up</h1></div>
            <div class="txt">Create account</div><br><br>  
            <div class="three">
            <div class = "box1">
              <input class="email" name = "email" type = "email" placeholder="Email" required>
            </div>
            <br>
            <div class="box2">
                <input class="pass" name = "pass" type = "password" placeholder="Password" required>
            </div>
            <br>
            <div class="box2">
                <input class="pass1" name = "prof" type = "text" placeholder="Profession" required>
            </div>
            </div>
            <div class="button">
                <input type = "submit" class="signup" name = "submit" value="Sign up">
            </div>
        </form>
    </div>
    
</body>
</html>