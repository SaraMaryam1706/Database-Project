<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");

    $con=new connec();
    $tbl="booking";
    $result=$con->select_all($tbl);




  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Booking Details</h5><hr>
                    <a href="addbooking.php">Add Booking</a>
                        <table class="table mt-5" border="1" class="mt-5">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                     <th>ID</th>
                                    <th>Customer ID</th>
                                    <th>Show ID</th>
                                    <th>Number of Tickets</th>
                                     <th>Seat Detail ID</th>
                                      <th>Booking Date</th>
                                     <th>Total Amount</th>
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
                                                     <td> <?php echo $row["cust_id"] ?> </td>
                                                    <td><?php echo $row["show_id"] ?></td>
                                                    <td><?php echo $row["no_ticket"] ?></td>
                                                    <td><?php echo $row["seat_dt_id"] ?></td>
                                                    <td><?php echo $row["booking_date"] ?></td>
                                                    <td><?php echo $row["total_amount"] ?></td>
                                                    <td><a href="editbooking.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit Booking</a>
                                                    <a href="deletebooking.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete Booking</a></td>
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
