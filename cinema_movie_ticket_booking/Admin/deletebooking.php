<?php 
session_start();

$c="";
$s="";
$t="";
$se="";
$d="";
$a="";



        if(isset($_POST["btn_update"]))
        {
            include("../conn.php");
            $id=$_GET["id"];
                   
                
            $con=new connec();


                $tbl="booking";
                $con->delete($tbl,$id);
            header("Location:viewbooking.php");

        }


if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");
                if(isset($_GET["id"])){
                $id=$_GET["id"];

        $con=new connec();
        $tbl="booking";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                            $c=$row["cust_id"];
                            $s=$row["show_id"];
                            $t=$row["no_ticket"];
                            $se=$row["seat_dt_id"];
                            $d=$row["booking_date"];
                            $a=$row["total_amount"];


                    }

                }




  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Delete Booking Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              
            <label for="email"><b>CustomerID</b></label>
            <input type="text"  name="cust_id"  value="<?php echo $c?>">

            <label for="psw"><b>Show ID</b></label>
            <input type="text"  name="show_id"  value="<?php echo $s?>"><br>

            <label for="psw"><b>Tickets</b></label>
            <input type="number"  name="tickets"  value="<?php echo $t?>"><br>

            <label for="psw"><b>Seat Details</b></label>
            <input type="number"  name="seat"  value="<?php echo $se?>"><br>

            <label for="psw"><b>Booking Date</b></label>
            <input type="date"  name="_date" value="<?php echo $b?>" ><br>

            <label for="psw"><b>Amount</b></label>
            <input type="number"  name="amount" value="<?php echo $a?>"><br>


                <a href="viewbooking.php" class="btn" style="background-color: black; color:white;">Cancel</a>
               <button type="submit" name="btn_update" class="btn" style="background-color: black; color:white;">Delete</button>

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