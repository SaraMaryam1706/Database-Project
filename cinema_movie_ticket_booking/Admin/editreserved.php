<?php 
session_start();

$b="";
$n="";
$t="";
$d="";



        if(isset($_POST["btn_update"]))
        {
            include("../conn.php");
            $show=$_POST["show_id"];  
                        $customer=$_POST["cust_id"];        
                  
            $seat=$_POST["seat_number"];     
                        $reserved=$_POST["reserved"];        
               
            $id=$_GET["id"];
                   
                
            $con=new connec();


            $sql = "UPDATE seat_reserved SET show_id = $show, cust_id = $customer, seat_number = '$seat', reserved = '$reserved' where id=$id;";
                $con->update($sql,"Record Updated");
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
                <h5 class="text-center mt-2" style="color: black;">Edit Reservation Details</h5><hr>
                        
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




               <button type="submit" name="btn_update" class="btn" style="background-color: black; color:white;">Update</button>

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