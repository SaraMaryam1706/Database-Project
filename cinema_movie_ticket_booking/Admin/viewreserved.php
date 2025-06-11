<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");

    $con=new connec();
    $tbl="seat_reserved";
    $result=$con->select_all($tbl);




  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Reservation Details</h5><hr>
                    <a href="addreserved.php">Add Reservation</a>
                        <table class="table mt-5" border="1" class="mt-5">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                     <th>ID</th>
                                    <th>Show ID</th>
                                     <th>Customer ID</th>
                                      <th>Seat Number</th>
                                      <th>Reserved</th>

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
                                                    <td><?php echo $row["show_id"] ?></td>
                                                     <td><?php echo $row["cust_id"] ?></td>

                                                    <td><?php echo $row["seat_number"] ?></td>
                                                     <td><?php echo $row["reserved"] ?></td>

                                                    <td><a href="editreserved.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit </a>
                                                    <a href="deletereserved.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete </a></td>
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
