<?php 
session_start();

$n="";



        if(isset($_POST["btn_delete"]))
        {
            include("../conn.php");
            $name=$_POST["industry_name"] ;                    
            $id=$_GET["id"];
                   
                
            $con=new connec();


                $table="industry";
                $con->delete($table,$id);
            header("Location:viewindustry.php");

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
        $tbl="industry";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                         $n=$row["industry_name"];

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
                <h5 class="text-center mt-2" style="color: black;">Delete Industry Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">


            <label for="psw"><b>Name</b></label>
            <input type="text"  name="industry_name"  value="<?php echo $n?>"><br><hr>



                <a href="viewindustry.php" class="btn" style="background-color: black; color:white;">Cancel</a>
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