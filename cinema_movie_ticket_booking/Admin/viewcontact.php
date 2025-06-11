<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");

    $con=new connec();
    $tbl="contact";
    $result=$con->select_all($tbl);





  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Contact Details</h5><hr>
                    <a href="addmovie.php"></a>
                        <table class="table mt-5" border="1" class="mt-5">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                     <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Messege</th>
                                    <th>Date</th>

                                    <th>Options</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($result->num_rows>0)
                                    {
                                        while($row=$result->fetch_assoc())
                                        {
                                            ?>
                                                 <tr>

                                                    <td> <?php echo $row["id"] ?> </td>
                                                     <td> <?php echo $row["name"] ?> </td>
                                                     <td> <?php echo $row["email"] ?> </td>
                                                    <td> <?php echo $row["messege"] ?> </td>
                                                    <td> <?php echo $row["currentdate"] ?> </td>
                                                    

                                                    <td><a href="deletecontact.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete </a>
                                                 </tr>
                                            <?php

                                        }
                                    }
                                ?>

                            </tbody>
                        </table>      
                        
                        
                </div>
              </div>
            </div>
          </section>
    <?php
            include("admin_footer.php");

}

  ?>
