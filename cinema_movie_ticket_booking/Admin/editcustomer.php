<?php 
session_start();

$n="";
$e="";
$c="";
$g="";
$p="";


        if(isset($_POST["btn_update"]))
        {
            include("../conn.php");
            $name=$_POST["fullname"];                    
            $email=$_POST["email"];                    
            $cellno=$_POST["cellno"];                    
            $gender=$_POST["gender"];                    
            $pass=$_POST["password"];                    
            $id=$_GET["id"];
                   
                
            $con=new connec();


            $sql = "UPDATE customer SET fullname = '$name', email = '$email', cellno = '$cellno', gender = '$gender', password = '$pass' WHERE id = $id;";       
                
                $con->update($sql,"Record Updated");
            header("Location:viewcustomer.php");

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
        $tbl="customer";
    //$sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->select($tbl,$id);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                         $n=$row["fullname"];
                        $e=$row["email"];
                         $c=$row["cellno"];
                        $g=$row["gender"];
                        $p=$row["password"];


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
                <h5 class="text-center mt-2" style="color: black;">Edit Customer Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              

            <label for="psw"><b>Name</b></label>
            <input type="text"  name="fullname"  value="<?php echo $n?>"><br>

            <label for="psw"><b>Email</b></label>
            <input type="text"  name="email"  value="<?php echo $e?>"><br>

            <label for="psw"><b>Cell Number</b></label>
            <input type="text"  name="cellno"  value="<?php echo $c?>"><br>

            <label for="psw"><b>Gender </b></label>
            <input type="text"  name="gender" value="<?php echo $g?>" ><br>

            <label for="psw"><b>Password</b></label>
            <input type="text"  name="password" value="<?php echo $p?>"><br><hr>




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