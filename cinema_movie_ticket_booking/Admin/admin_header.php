<?php
    include("../conn.php")
    ?>


      <!doctype html>
          <html lang="en">
            <head>
              <title>dashboard</title>
              <!-- Required meta tags -->
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

                <link rel="icon" href="images/projector.webp">
                 <!-- Bootstrap CSS -->
                     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <!-- cloudfare CSS -->
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

              <!-- Bootstrap CSS -->
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            </head>
            <body>
                
          <nav class="navbar navbar-expand-md navbar-dark bg-dark">
              <a class="navbar-brand" href="dashboard.php"><img src="..//images/projector.webp" style="width: 45px;"></a>
              <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                  aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavId">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                      <li class="nav-item ">
                        <h2> <a class="nav-link" href="dashboard.php" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; ">Admin Panel</a></h2>
                      </li>
                    
                  </ul>
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="../Admin/index.php">Logout</a>
                      </li>

                  </ul>
                        
                  
                                

                  
                  
              </div>
          </nav>

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

        