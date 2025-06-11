<?php 
session_start();

$m="";
$d="";
$t="";
$s="";
$c="";
$ti="";



        if(isset($_POST["btn_update"]))
        {
            include("../conn.php");
            $movie=$_POST["movie_id"];        
            $date=$_POST["show_date"];                    
            $time=$_POST["show_time_id"];                    
            $seats=$_POST["no_seats"];                    
            $cinema=$_POST["cinema_id"];                    
            $ticket=$_POST["ticket_price"];                    
            $id=$_GET["id"];
                   
                
            $con=new connec();


            $sql = "UPDATE shows SET movie_id = $movie, show_date = '$date', show_time_id = $time, no_seats = $seats, cinema_id = $cinema , ticket_price=$ticket WHERE id = $id;";       
                
                $con->update($sql,"Record Updated");
            header("Location:viewshows.php");

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
        $tbl="shows";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                         $m=$row["movie_id"];
                        $d=$row["show_date"];
                         $t=$row["show_time_id"];
                        $s=$row["no_seats"];
                        $c=$row["cinema_id"];
                        $ti=$row["ticket_price"];



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
                <h5 class="text-center mt-2" style="color: black;">Edit Show Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              

            <label for="psw"><b>Movie ID</b></label>
            <input type="text"  name="movie_id"  value="<?php echo $m?>"><br>

            <label for="psw"><b>Date</b></label>
            <input type="date"  name="show_date"  value="<?php echo $d?>"><br>

            <label for="psw"><b>Time Id</b></label>
            <input type="text"  name="show_time_id"  value="<?php echo $t?>"><br>

            <label for="psw"><b>Seats </b></label>
            <input type="text"  name="no_seats" value="<?php echo $s?>" ><br>

            <label for="psw"><b>Cinema ID</b></label>
            <input type="text"  name="cinema_id" value="<?php echo $c?>"><br>

                        <label for="psw"><b>Ticket Price</b></label>
            <input type="text"  name="ticket_price" value="<?php echo $ti?>"><br><hr>





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