<?php
include("conn.php");
$con=new connec();

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_GET["action"]))
{
    if($_GET["action"]=="logout")
    {
            $_SESSION["username"]=null;
            $_SESSION["cust_id"]=null;

    }
}

 if(empty($_SESSION["username"]))
{
 $_SESSION["ul"]=' <li class="nav-item"><a class="nav-link" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">Register</a> </li> <li class="nav-item"> <a class="nav-link" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId1">Login</a>  </li> ';
}


if(isset($_POST["btn_login"]))
{ 
        $email_log=$_POST["log_email"];
        $passsword_log=$_POST["log_psw"];

        $result=$con->select_login("customer",$email_log);

        if($result->num_rows>0)
        {
            $row=$result->fetch_assoc();
            if($row["email"]==$email_log && $row["password"]==$passsword_log)
            {
                    $_SESSION["username"]=$row["fullname"];
                    $_SESSION["cust_id"]=$row["id"];

                    $_SESSION["ul"]='<li class="nav-item"><a class="nav-link">Hi '.$_SESSION["username"].'</a></li>    <li class="nav-item"><a class="nav-link" href="index.php?action=logout">Logout</a></li>';

            }
            else
            {
                  echo' <script>alert("Invalid Password");</script>';

            }
        }
        else
        {
                       echo' <script>alert("Invalid email");</script>';

        }
}

if(isset($_POST["btn_reg"]))
{
    $name=$_POST["reg_full_name"];
    $email=$_POST["reg_email"];
    $cellno=$_POST["reg_number_txt"];
    $gender=$_POST["reg_gender_txt"];
    $passsword=$_POST["reg_psw"];
    $confirm_password=$_POST["psw_repeat"];

    if($passsword==$confirm_password)
    {
            $sql="insert into customer values(0,'$name','$email','$cellno','$gender','$passsword')";
    $con->insert($sql,"Regitration complete");


    }
    else 
    {
        ?>
        <script>alert("Confirm password not matched");</script>
        <?php
    }
}



?>




<!doctype html>
<html lang="en">
  <head>
    <title>Movie Ticket Booking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="icon" href="images/projector.webp">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- cloudfare CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


      <style>
        .body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            min-height: 100vh;
        }

           .register-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
}


        .register-form h1 {
            margin-bottom: 10px;
        }

        .register-form p {
            color: #666;
        }

        .register-form hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }

        .register-form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

         .register-form input[type="tel"],
        .register-form input[type="text"],
        .register-form input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 30px;
            box-sizing: border-box;
            transition: 0.3s;
        }

          .register-form input[type="tel"]:focus,
        .register-form input[type="text"]:focus,
        .register-form input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .register-form a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-form a:hover {
            text-decoration: underline;
        }

        .container.sign-in {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

</style>

    

</head>
  <body>
      
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="images/projector.webp" style="width: 45px;"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home</a>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movies</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="comingsoon.php">Coming Soon</a>
                    <a class="dropdown-item" href="nowshowing.php">Showing</a>
                </div>
            </li>

                         <!-- <li class="nav-item">
                <a class="nav-link" href="offer.php">Offers</a>
            </li> -->

             <li class="nav-item">
                <a class="nav-link" href="booking.php">Book Ticket</a>
            </li>

             <!-- <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li> -->

             <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>

         
              
          <ul class="navbar-nav">
   
                <?php
                if (isset($_SESSION["ul"])) {
                    echo $_SESSION["ul"];
                }
                ?>

          </ul>
                        <!-- <li class="nav-item">
                            Register Button trigger modal

                <a class="nav-link" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">Register</a>
            </li>
                                        Login Button trigger modal

             <li class="nav-item">
                <a class="nav-link" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId1">Login</a>
            </li> -->

        
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>




<!-- Register Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header" style="background-color: black; color:white;">
                 

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
<form method="post" class="register-form">
    <div class="container">
        <center>
            <h1>Register</h1>
            <p>Please fill this form to create an account</p>
        </center>
        <hr>

        <label for="username"><b>Full Name</b></label>
        <input type="text" placeholder="Enter your name" name="reg_full_name" id="username" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="reg_email" id="email" required>

                        <label for="number"><b>Cell Number</b></label>
        <input type="tel" placeholder="Enter number" name="reg_number_txt" id="number" required>

                                <label for="number"><b>Select Gender</b></label>
        <input type="radio" value="male" name="reg_gender_txt" id="number" style="margin-right: 2%;" required>Male 
                <input type="radio" value="female" name="reg_gender_txt" id="number" style="margin-left: 2%;"required> Female 


        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="reg_psw" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat" required><hr>


         <button type="submit" name="btn_reg" class="btn" style="background-color: black; color:white;">Register</button><hr>

        

        <center>
            <p>By creating an account you agree to our <a href="#">Terms</a></p>
        </center>
    </div>

    <div class="container sign-in">
        <p>Already have an account? <a data-toggle="modal" data-target="#modelId1" data-dismiss="modal">Login</a></p>
    </div>
</form>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-black">Register</button>
            </div> -->
        </div>
    </div>
</div>



<!-- Login Modal -->
<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="background-color: black; color:white;">
                        <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
        <form method="post" class="register-form">
            <div class="container" style="color:black;">
                <center>
                    <h1>
                        Login
                    </h1>
                </center>
             <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="log_email" id="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="log_psw" id="psw" required><br><hr>

                            <button type="submit" name="btn_login" class="btn" style="background-color: black; color:white;">Login</button>

            </div>


        </form>        
    
             </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>