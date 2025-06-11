<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $name=$_POST["genre_name"];                    
                
            
            
            $con=new connec();


            $sql="insert into genre values(0,'$name')";
            $con->insert($sql,"Record Inserted");
            header("Location:viewgenre.php");


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
                <h5 class="text-center mt-2" style="color: black;">Add Genre</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              

            <label for="psw"><b>Genre</b></label>
            <input type="text"  name="genre_name"  required><br><hr>



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