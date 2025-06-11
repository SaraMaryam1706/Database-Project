<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $banner=$_POST["banner"];        
            $name=$_POST["name"];                    
            $type=$_POST["type"];                    
            $date=$_POST["_date"];                    
            $industry=$_POST["industry"];                    
            $genre=$_POST["genre"];                    
            $language=$_POST["language"];                    
            $duration=$_POST["duration"];    
            $description=$_POST["description"];                    
                
            
            
            $con=new connec();


            $sql="insert into movie values(0,'$name','$type','$banner','$description','$date',$industry,$genre,$language,'$duration')";
            $con->insert($sql,"Record Inserted");
            header("Location:viewmovie.php");


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
                <h5 class="text-center mt-2" style="color: black;">Add Movie</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              
            <label for="email"><b>Banner</b></label>
            <input type="text"  name="banner"  required>

            <label for="psw"><b>Name</b></label>
            <input type="text"  name="name"  required><br>

            <label for="psw"><b>Type</b></label>
            <input type="text"  name="type"  required><br>

            <label for="psw"><b>Release Date</b></label>
            <input type="date"  name="_date"  required><br>

            <label for="psw"><b>Industry ID</b></label>
            <input type="text"  name="industry"  required><br>

            <label for="psw"><b>Genre ID</b></label>
            <input type="text"  name="genre" required><br>

            <label for="psw"><b>Language ID</b></label>
            <input type="text"  name="language"  required><br>

            <label for="psw"><b>Duration</b></label>
            <input type="time"  name="duration"  required><br><hr>

                        <label for="psw"><b>Description</b></label>
            <textarea name="description" id="description" rows="5" cols="60" class="form-control" required></textarea><br><hr>



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