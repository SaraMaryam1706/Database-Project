<?php 
session_start();

$b="";
$n="";




        if(isset($_POST["btn_update"]))
        {
            include("../conn.php");
            $img=$_POST["img_path"];
                        $alt=$_POST["alt"];                    
               
            $id=$_GET["id"];
                   
                
            $con=new connec();


            $sql = "UPDATE slider SET img_path = '$img', alt = '$alt' where id=$id;";
                $con->update($sql,"Record Updated");
            header("Location:viewslider.php");

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
        $tbl="slider";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                         $b=$row["img_path"];
                        $n=$row["alt"];


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
                <h5 class="text-center mt-2" style="color: black;">Edit Slider Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              
            <label for="email"><b>Image</b></label>
            <input type="text"  name="img_path" value="<?php echo $b?>" >

            <label for="psw"><b>ALt</b></label>
            <input type="text"  name="alt"  value="<?php echo $n?>"><br><hr>





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