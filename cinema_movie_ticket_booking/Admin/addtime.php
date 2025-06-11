<?php 
session_start();
        if(isset($_POST["btn_insert"]))
        {
            include("../conn.php");
            $show=$_POST["show_id"];
                        $time=$_POST["time"];                    
                    
                
            
            
            $con=new connec();


            $sql="insert into industry values(0,$show,'$time')";
            $con->insert($sql,"Record Inserted");
            header("Location:viewtime.php");


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
                <h5 class="text-center mt-2" style="color: black;">Add Time</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">
              

            <label for="psw"><b>Show Id</b></label>
            <input type="text"  name="show_id"  required><br><hr>

                        <label for="psw"><b>Time </b></label>
            <input type="text"  name="time"  required><br><hr>



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