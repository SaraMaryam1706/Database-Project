<?php 
session_start();

$na="";
$ei="";
$me="";
$ca="";


        if(isset($_POST["btn_delete"]))
        {
            include("../conn.php");
            $id=$_GET["id"];
                   
                
            $con=new connec();


                $table="contact";
                $con->delete($table,$id);
            header("Location:viewcontact.php");

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
        $tbl="contact";
    $result8=$con->select($tbl,$id);
                    if($result8->num_rows>0)
                    {
                        $row=$result8->fetch_assoc();
                         $na=$row["name"];
                        $ei=$row["email"];
                         $me=$row["messege"];
                        $ca=$row["currentdate"];


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
                <h5 class="text-center mt-2" style="color: black;">Delete Contact Details</h5><hr>
                        
         <form method="post" class="register-form">
            <div class="container" style="color:black;">

              

            <label for="psw"><b>Name</b></label>
            <input type="text"  name="name"  value="<?php echo $na?>"><br>

            <label for="psw"><b>Email</b></label>
            <input type="text"  name="email"  value="<?php echo $ei?>"><br>

             <label for="psw"><b>Messege</b></label>
            <input type="text"  name="messege" value="<?php echo $me?>" ><br>

            <label for="psw"><b>Date</b></label>
            <input type="date"  name="date"  value="<?php echo $ca?>"><br><hr>




                <a href="viewcontact.php" class="btn" style="background-color: black; color:white;">Cancel</a>
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