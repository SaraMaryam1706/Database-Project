<?php 
session_start();

$b="";
$n="";
$t="";
$d="";
$i="";
$g="";
$l="";
$du="";
$de="";


        if(isset($_POST["btn_update"]))
        {
            include("../conn.php");
            $banner=$_POST["banner"] ;        
            $name=$_POST["name"] ;                    
            $type=$_POST["type"] ;                    
            $date=$_POST["_date"] ;                    
            $industry=$_POST["industry"] ;                    
            $genre=$_POST["genre"] ?? null;                    
            $language=$_POST["language"] ;                    
            $duration=$_POST["duration"];    
            $description=$_POST["description"]; 
            $id=$_GET["id"];
                   
                
            $con=new connec();


            $sql = "UPDATE movie SET name = '$name', type = '$type', movie_banner = '$banner', movie_desc = '$description', rel_date = '$date', industry_id = $industry, genre_id = $genre, lang_id = $language, duration = '$duration' WHERE id = $id;";       
                
                $con->update($sql,"Record Updated");
            header("Location:viewmovie.php");

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
        $tbl="movie";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                         $n=$row["name"];
                        $t=$row["type"];
                         $b=$row["movie_banner"];
                        $de=$row["movie_desc"];
                        $d=$row["rel_date"];
                        $i=$row["industry_id"];
                        $g=$row["genre_id"];
                        $l=$row["lang_id"];
                        $du=$row["duration"];


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
                <h5 class="text-center mt-2" style="color: black;">Edit Movie Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              
            <label for="email"><b>Banner</b></label>
            <input type="text"  name="banner" value="<?php echo $b?>" >

            <label for="psw"><b>Name</b></label>
            <input type="text"  name="name"  value="<?php echo $n?>"><br>

            <label for="psw"><b>Type</b></label>
            <input type="text"  name="type"  value="<?php echo $t?>"><br>

            <label for="psw"><b>Release Date</b></label>
            <input type="date"  name="_date"  value="<?php echo $d?>"><br>

            <label for="psw"><b>Industry ID</b></label>
            <input type="text"  name="industry" value="<?php echo $i?>" ><br>

            <label for="psw"><b>Genre ID</b></label>
            <input type="text"  name="genre" value="<?php echo $g?>"><br>

            <label for="psw"><b>Language ID</b></label>
            <input type="text"  name="language"  value="<?php echo $l?>"><br>

            <label for="psw"><b>Duration</b></label>
            <input type="time"  name="duration"  value="<?php echo $du?>"><br><hr>

                        <label for="psw"><b>Description</b></label>
            <textarea name="description" id="description" rows="5" cols="60" class="form-control"  value="<?php echo $de?>"></textarea><br><hr>



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