<?php
session_start();
$_SESSION["admin_username"]="";

if(isset($_POST["btn_login"]))
{ 
        $email_log=$_POST["log_email"];
        $passsword_log=$_POST["log_psw"];

        
        
            if("admin@yahoo.com"==$email_log && "1234"==$passsword_log)
            {
                    $_SESSION["admin_username"]=$email_log;

                    //$_SESSION["ul"]='<li class="nav-item"><a class="nav-link">Hi '.$_SESSION["username"].'</a></li>    <li class="nav-item"><a class="nav-link" href="index.php?action=logout">Logout</a></li>';
                    header("Location:dashboard.php");
            }
            else
            {
                  echo' <script>alert("Invalid Password or Email");</script>';

            }
       
}
?>



<!doctype html>
<html lang="en">
  <head>
    <title>ADMIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .register-form {
        max-width: 600px;
        width: 90%;
        margin:  auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .register-form h1 {
        margin-bottom: 10px;
        font-size: 28px;
        color: #333;
    }

    .register-form p {
        color: #666;
        font-size: 14px;
    }

    .register-form hr {
        border: none;
        height: 1px;
        background: #ddd;
        margin: 20px 0;
    }

    .register-form label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #222;
    }

    .register-form input[type="text"],
    .register-form input[type="password"] {
        width: 100%;
        padding: 16px 20px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 30px;
        box-sizing: border-box;
        font-size: 14px;
        transition: border 0.3s ease;
    }

    .register-form input:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .register-form .btn {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 30px;
        background-color: #000;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
        margin-top: 20px;
    }

    .register-form .btn:hover {
        background-color: #333;
    }

    @media (max-width: 576px) {
        .register-form {
            margin: 40px 20px;
            padding: 20px;
        }
    }

</style>
  </head>
  <body>




        <div class="full_page">
            <div class="row">
                <!-- <div class="col-md-6"> -->
                    
                        <form method="post" class="register-form" style="margin: auto;">
            <div class="container" style="color:black;">
                <center>
                    <h1>
                        Admin Login
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
            </div>
        </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>