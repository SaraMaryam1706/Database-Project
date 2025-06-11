<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $name=$_POST["fullname"];                    
            $email=$_POST["email"];                    
            $cellno=$_POST["cellno"];                    
            $gender=$_POST["gender"];                    
            $pass=$_POST["password"];                    
                
            
            
            $con=new connec();


            $sql="insert into customer values(0,'$name','$email','$cellno','$gender','$pass')";
            $con->insert($sql,"Record Inserted");

            header("Location:viewcustomer.php");


        }


if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");





  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Add Customer</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              

            <label for="psw"><b>Name</b></label>
            <input type="text"  name="fullname"  required><br>

            <label for="psw"><b>Email</b></label>
            <input type="text"  name="email"  required><br>

            <label for="psw"><b>Cell Number</b></label>
            <input type="text"  name="cellno"  required><br>

            <label for="psw"><b>Gender</b></label>
            <input type="text"  name="gender"  required><br>

            <label for="psw"><b>Password</b></label>
            <input type="text"  name="password" required><br><hr>




               <button type="submit" name="btn_insert" class="btn" style="background-color: black; color:white;">Insert</button>

            </div>


        </form>        
        

                </div>
              </div>
            </div>
          </section>
    <?php
            include("admin_footer.php");

}

  ?>