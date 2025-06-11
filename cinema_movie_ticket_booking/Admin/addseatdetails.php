<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $customer=$_POST["cust_id"];        
            $show=$_POST["show_id"];                    
            $seat=$_POST["seat_no"];                    
                
            
            
            $con=new connec();


            $sql="insert into seat_detail values(0,$customer,$show,$seat)";
            $con->insert($sql,"Record Inserted");
            header("Location:viewseatdetails.php");


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
                <h5 class="text-center mt-2" style="color: black;">Add Seat</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              
            <label for="email"><b>Customer ID</b></label>
            <input type="text"  name="cust_id"  required>

            <label for="psw"><b>Show ID</b></label>
            <input type="text"  name="show_id"  required><br>

            <label for="psw"><b>No of Seats</b></label>
            <input type="text"  name="seat_no"  required><br><hr>


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