<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $movie=$_POST["movie_id"];        
            $date=$_POST["show_date"];                    
            $time=$_POST["show_time_id"];                    
            $seats=$_POST["no_seats"];                    
            $cinema=$_POST["cinema_id"];                    
            $ticket=$_POST["ticket_price"];                    
                
            
            
            $con=new connec();


            $sql="insert into shows values(0,'$movie','$date','$time','$seats',$cinema,$ticket)";
            $con->insert($sql,"Record Inserted");
            header("Location:viewshows.php");


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
                <h5 class="text-center mt-2" style="color: black;">Add Show</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              
            <label for="email"><b>Movie ID</b></label>
            <input type="text"  name="movie_id"  required>

            <label for="psw"><b>Date</b></label>
            <input type="date"  name="show_date"  required><br>

            <label for="psw"><b>Time ID</b></label>
            <input type="text"  name="show_time_id"  required><br>

            <label for="psw"><b>Seats </b></label>
            <input type="text"  name="no_seats"  required><br>

            <label for="psw"><b>Cinema ID</b></label>
            <input type="text"  name="cinema_id"  required><br>

            <label for="psw"><b>Ticket Price</b></label>
            <input type="text"  name="ticket_price" required><br><hr>




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