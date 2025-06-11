<?php 
session_start();
        if(isset($_POST["btn_inserts"]))
        {
            include("../conn.php");
                
            
            
            $con=new connec();


            $sql="insert into booking values(0,$customer,$show,$ticket,$Seat,'$b_date',$amount)";
            $con->insert($sql,"Record Inserted");
            header("Location:viewbooking.php");


         if ($con->insert($sql, "Record Inserted")) {
             header("Location:viewbooking.php");
                exit;
           }  else {
        echo "Error in query: $sql";
    }
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
                <h5 class="text-center mt-2" style="color: black;">Add Booking</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              
            <label for="email"><b>CustomerID</b></label>
            <input type="text"  name="cust_id"  required>

            <label for="psw"><b>Show ID</b></label>
            <input type="text"  name="show_id"  required><br>

            <label for="psw"><b>Tickets</b></label>
            <input type="number"  name="tickets"  required><br>

            <label for="psw"><b>Seat Details</b></label>
            <input type="number"  name="seat"  required><br>

            <label for="psw"><b>Booking Date</b></label>
            <input type="date"  name="_date"  required><br>

            <label for="psw"><b>Amount</b></label>
            <input type="number"  name="amount" required><br>




               <button type="submit" name="btn_inserts" class="btn" style="background-color: black; color:white;">Insert</button>

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