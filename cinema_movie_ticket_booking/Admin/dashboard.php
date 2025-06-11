<?php 
session_start();

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
                <h5 class="text-center " style="color: black;">Admin DashBoard</h5>
                
                </div>
              </div>
            </div>
          </section>
    <?php
            include("admin_footer.php");

}

  ?>
