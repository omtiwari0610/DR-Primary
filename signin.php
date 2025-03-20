<?php
  include("connection.php");
  if (file_exists(__DIR__ . '/../failover.php')) {
      include('../failover.php');
  }
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
   
    $sql = "select * from signup where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
        if($row["password"] == $password){
            if (strcasecmp($row["profession"], "Customer") == 0){
                header("Location: user.php");
                exit();
            }
            elseif(strcasecmp($row["profession"], "Pharmacist") == 0){
                header("Location: pharma.php");
            }
        }        
        else{
            echo '<script>
            alert("Invalid credentials!");
            window.location.href = "signin.php";
            </script>';
        }
    }
    else{
        echo '<script>
            alert("User does not exist! \nCreate an account first!");
            window.location.href = "signup.php";
            header("Location: signup.php");
            </script>';
        
    }
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
        .signup{
            position: absolute;
            bottom: 5vh;
            left:9vw;
            height:4vh;
            width:15vw;
            color:white;
            background-color: blue;
            border-radius:60px;
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
            top:20vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action = "signin.php" method="POST">
            <div class="header"><h1>Sign in</h1></div>
            <div class="txt">Verify account</div><br><br>  
            <div class="three">
            <div class = "box1">
              <input class="email" name = "email" type = "email" placeholder="Email">
            </div>
            <br>
            <div class="box2">
                <input class="pass" name = "pass" type = "password" placeholder="Password">
            </div>
            </div>
            <div class="button">
                <input type = "submit"  class="signup" name = "submit" value="Sign in">
            </div>
        </form>
    </div>
    
</body>
</html>