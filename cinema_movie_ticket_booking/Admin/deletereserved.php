<?php 
session_start();

$b="";
$n="";
$t="";
$d="";



        if(isset($_POST["btn_delete"]))
        {
            include("../conn.php");
            $show=$_POST["show_id"];  
                        $customer=$_POST["cust_id"];        
                  
            $seat=$_POST["seat_number"];     
                        $reserved=$_POST["reserved"];        
               
            $id=$_GET["id"];
                   
                
            $con=new connec();


                $table="seat_reserved";
                $con->delete($table,$id);
            header("Location:viewreserved.php");

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
        $tbl="seat_reserved";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                         $n=$row["show_id"];
                        $t=$row["cust_id"];
                         $b=$row["seat_number"];
                        $de=$row["reserved"];


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
                <h5 class="text-center mt-2" style="color: black;">Delete Reservation Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              
            <label for="email"><b>Show Id</b></label>
            <input type="text"  name="show_id" value="<?php echo $n?>" >

            <label for="psw"><b>Customer Id</b></label>
            <input type="text"  name="cust_id"  value="<?php echo $t?>"><br>

            <label for="psw"><b>Seat Number</b></label>
            <input type="text"  name="seat_number"  value="<?php echo $b?>"><br>

            <label for="psw"><b>Reserved</b></label>
            <input type="bool"  name="reserved"  value="<?php echo $de?>"><br><hr>




                <a href="viewreserved.php" class="btn" style="background-color: black; color:white;">Cancel</a>
               <button type="submit" name="btn_delete" class="btn" style="background-color: black; color:white;">Delete</button>

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