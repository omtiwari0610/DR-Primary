<?php
  include("connection.php");
  if (file_exists(__DIR__ . '/../failover.php')) {
    include('../failover.php');
  }
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $prof = $_POST['prof'];

    $sql = "select * from signup where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $count_email = mysqli_num_rows($result);

    if($count_email == 0){
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO signup(email,password,profession) VALUES('$email','$password','$prof')";
        mysqli_query($conn,$sql);
        header("Location: signin.php");
    }
    else{
        if($count_email>0){
            echo '<script>
            window.location.href="signin.php";
            alert("This Email already exists!!\nGo and signin instead!");
            </script>';
        }   
     }
  }
?>