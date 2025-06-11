<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $show=$_POST["show_id"];  
                        $customer=$_POST["cust_id"];        
                  
            $seat=$_POST["seat_number"];     
                        $reserved=$_POST["reserved"];        
               
                
            
            
            $con=new connec();


            $sql="insert into seat_reserved values(0,$show,$customer,'$seat',$reserved)";
            $con->insert($sql,"Record Inserted");
            header("Location:viewreserved.php");


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
                <h5 class="text-center mt-2" style="color: black;">Add Reservation</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              
            <label for="email"><b>Show ID</b></label>
            <input type="text"  name="show_id"  required>

            <label for="psw"><b>Customer ID</b></label>
            <input type="text"  name="cust_id"  required><br>

            <label for="psw"><b>Seat Nummber</b></label>
            <input type="text"  name="seat_number"  required><br>

            <label for="psw"><b>Reserved</b></label>
            <input type="bool"  name="reserved"  required><br><hr>




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